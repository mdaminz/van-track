<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

use App\Models\Student;
use App\Models\Van;
use App\Models\Rate;
use App\Models\Attendance;
use Carbon\Carbon;
class DriverController extends Controller
{

    public function driver_view_student()
    {
        $van = Van::with('rates.students')->where('user_id', Auth::id())->first();

        $rates = $van ? $van->rates : collect();

        // Merge all students from all rates into a single collection, remove duplicates, and filter by 'Active' status
        $students = $rates->flatMap->students
            ->unique('id')
            ->where('status', 'Active');

        return view('driver.student.view_student', compact('students', 'rates'));
    }


    public function driver_view_attendance()
    {
        $user = Auth::user();

        // Get the driver's van
        $van = Van::where('user_id', $user->id)->first();

        // Get all rates for that van
        $rates = $van ? $van->rates : collect(); // safe if van is null

        // Get all students associated with these rates
        $students = $rates->flatMap->students;

        $studentIds = $students->pluck('id');

        // Get all attendance records for those students
        $attendances = Attendance::whereIn('student_id', $studentIds)->latest()->get();

        return view('driver.attendance.view_attendance', compact('attendances', 'rates'));

    }

    public function driver_calendar()
    {
        $user = Auth::user();

        if ($user->usertype !== 'driver') {
            abort(403);
        }

        $vanId = $user->vans()->first()?->id;
        $rates = Rate::where('van_id', $vanId)->with('school')->get();

        $events = [];
        $startDate = Carbon::now()->startOfWeek();
        $endDate = Carbon::now()->addMonths(3);

        while ($startDate->lte($endDate)) {
            for ($i = 0; $i < 5; $i++) { // Monday to Friday
                $day = $startDate->copy()->addDays($i);

                foreach ($rates as $rate) {
                    $district = $rate->district ?? 'District';
                    $schoolName = $rate->school->name ?? 'School';

                    $events[] = [
                        'title' => "$district → $schoolName",
                        'start' => $day->format('Y-m-d') . 'T' . $rate->start_time,
                        'color' => '#3c8dbc',
                        'textColor' => '#ffffff', // white font
                    ];

                    $events[] = [
                        'title' => "$schoolName → $district",
                        'start' => $day->format('Y-m-d') . 'T' . $rate->end_time,
                        'color' => '#a3cde6',
                        'textColor' => '#ffffff', // white font
                    ];
                }
            }
            $startDate->addWeek();
        }

        return view('driver.calendar.view_calendar', ['events' => json_encode($events)]);
    }

    public function schedule_list()
    {
        $user = Auth::user();

        $schedule = Rate::whereHas('van', function ($query) use ($user) {
            $query->where('user_id', $user->id);
        })->get();


        return view('driver.schedule.schedule_list', compact('schedule'));

    }



    public function student_listToSchool($id)
    {
        $today = Carbon::today();

        $driver = Auth::user(); // logged-in driver
        $rate = Rate::findOrFail($id);

        $students = Student::where('rate_id', $id)
            ->where('status', 'Active')
            ->orderBy('full_name', 'asc')
            ->get()
            ->map(function ($student) use ($today) {
                $attendances = Attendance::where('student_id', $student->id)
                    ->whereDate('created_at', $today)
                    ->orderBy('created_at')
                    ->pluck('status');

                $attendanceStatus = 'Absent';

                if ($attendances->get(0) === 'In') {
                    $attendanceStatus = 'Present';
                }

                $student->attendance_status = $attendanceStatus;
                return $student;
            });

        // Count present students
        $presentCount = $students->where('attendance_status', 'Present')->count();
        $totalCount = $students->count();

        return view('driver.schedule.listToSchool', compact('students', 'driver', 'rate', 'presentCount', 'totalCount'));
    }




    public function student_listToHome($id)
    {
        $today = Carbon::today();

        $driver = Auth::user();
        $rate = Rate::findOrFail($id);

        $students = Student::where('rate_id', $id)
            ->where('status', 'Active')
            ->orderBy('full_name', 'asc')
            ->get()
            ->map(function ($student) use ($today) {
                $attendances = Attendance::where('student_id', $student->id)
                    ->whereDate('created_at', $today)
                    ->orderBy('created_at')
                    ->pluck('status');

                $attendanceStatus = 'Absent';

                if ($attendances->get(2) === 'In') {
                    $attendanceStatus = 'Present';
                }

                $student->attendance_status = $attendanceStatus;
                return $student;
            });

        // Count present and total students
        $presentCount = $students->where('attendance_status', 'Present')->count();
        $totalCount = $students->count();

        return view('driver.schedule.listToHome', compact('students', 'driver', 'rate', 'presentCount', 'totalCount'));
    }



}
