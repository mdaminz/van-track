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

        // Merge all students from all rates into a single collection and remove duplicates
        $students = $rates->flatMap->students->unique('id');

        return view('driver.student.view_student', compact('students', 'rates'));
    }


    public function driver_view_attendance()
    {
        $user = Auth::user();

        // Get the driver's van
        $van = \App\Models\Van::where('user_id', $user->id)->first();

        // Get all rates for that van
        $rates = $van ? $van->rates : collect(); // safe if van is null

        // Get all students associated with these rates
        $students = $rates->flatMap->students;

        $studentIds = $students->pluck('id');

        // Get all attendance records for those students
        $attendances = \App\Models\Attendance::whereIn('student_id', $studentIds)->latest()->get();

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
                    'font' => '#ebf1f5',
                ];

                $events[] = [
                    'title' => "$schoolName → $district",
                    'start' => $day->format('Y-m-d') . 'T' . $rate->end_time,
                    'color' => '#a3cde6',
                    'font' => '#ebf1f5',
                ];
            }
        }
        $startDate->addWeek();
    }

        return view('driver.calendar.view_calendar', ['events' => json_encode($events)]);
    }
}
