<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\School;
use App\Models\Attendance;
use App\Models\Feedback;
use App\Models\Student;
use App\Models\Report;
use App\Models\Van;
use App\Models\Schedule;

class AdminController extends Controller
{

    public function index()
    {

        if (Auth::id()) {

            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                return view('user.index');
            } else if ($usertype == 'admin') {
                return view('admin.index');
            } else if ($usertype == 'driver') {
                return view('driver.index');
            } else {
                return redirect()->back();
            }
        }
    }

    public function view_school()
    {
        $school_data = School::all();

        return view('admin.school.view_school', compact('school_data'));
    }

    public function create_school()
    {
        return view('admin.school.create_school');
    }

    public function add_school(Request $request)
    {
        $school_data = new School;

        $school_data->type = $request->type;
        $school_data->name = $request->name;
        $school_data->first_address = $request->first_address;
        $school_data->second_address = $request->second_address;
        $school_data->type = $request->type;


        $school_data->image = $request->image;
        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('school', $imagename);

            $school_data->image = $imagename;
        }

        $school_data->save();

        return redirect('view_school');
    }

    public function update_school($id)
    {
        $school_data = School::find($id);

        return view('admin.school.update_school', compact('school_data'));
    }

    public function edit_school(Request $request, $id)
    {
        $school_data = School::find($id);

        $school_data->type = $request->type;
        $school_data->name = $request->name;
        $school_data->first_address = $request->first_address;
        $school_data->second_address = $request->second_address;


        if ($request->hasFile('image')) {
            // Delete the old image (optional)
            if ($school_data->image && file_exists(public_path('school/' . $school_data->image))) {
                unlink(public_path('school/' . $school_data->image));
            }

            // Save the new image
            $image = $request->file('image');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('school'), $imagename);
            $school_data->image = $imagename;
        }

        $school_data->save();

        return redirect('view_school');
    }

    public function delete_school($id)
    {
        $school_data = School::find($id);

        $school_data->delete();

        return redirect()->back();
    }

    //Atendance
    public function admin_view_attendance()
    {

        $attendances = Attendance::with('student')
            ->orderBy('created_at', 'desc') // Order by latest
            ->get(); // Eager load students

        return view('admin.attendance.view_attendance', compact('attendances'));
    }

    public function admin_view_feedback()
    {
        $feedback_data = Feedback::all();

        return view('admin.feedback.view_feedback', compact('feedback_data'));
    }

    public function admin_view_student()
    {
        // Retrieve users with usertype 'user', ordered by latest, descending
        $students = Student::orderBy('created_at', 'desc')->get(); // Order by the `created_at` column in descending order

        return view('admin.student.view_student', compact('students'));
    }

    public function admin_create_student()
    {
        return view('admin.student.create_student');
    }

    public function admin_update_student($id)
    {
        $students = Student::find($id);

        return view('admin.student.update_student', compact('students'));
    }

    public function admin_edit_student(Request $request, $id)
    {

        $students = Student::find($id);

        $students->full_name = $request->full_name;
        $students->date_of_birth = $request->date_of_birth;
        $students->relationship = $request->relationship;
        $students->emergency_contact = $request->emergency_contact;
        $students->address = $request->address;
        $students->user_id = $request->user_id;

        $students->rfid_tag = $request->rfid_tag;
        $students->status = $request->status;


        $students->save();

        return redirect('admin_view_student');
    }

    public function admin_delete_student($id)
    {
        $students = Student::find($id);

        $students->delete();

        return redirect()->back();
    }

    public function view_van()
    {
        return view('admin.van.view_van');
    }

    public function view_parent()
    {
        // Retrieve users with usertype 'user', ordered by latest, descending
        $parent_data = User::where('usertype', 'user')
            ->orderBy('created_at', 'desc') // Order by the `created_at` column in descending order
            ->get();

        return view('admin.parent.view_parent', compact('parent_data'));
    }

    public function view_vandriver()
    {
        // Retrieve users with usertype 'user', ordered by latest, descending
        $vandriver_data = User::where('usertype', 'driver')
            ->orderBy('created_at', 'desc') // Order by the `created_at` column in descending order
            ->get();

        return view('admin.vandriver.view_vandriver', compact('vandriver_data'));
    }

    public function update_vandriver($id)
    {
        $vandriver_data = User::find($id);

        return view('admin.vandriver.update_vandriver', compact('vandriver_data'));
    }

    public function view_alluser()
    {
        // Retrieve users with usertype 'user', ordered by latest, descending
        $alluser_data = User::orderBy('created_at', 'desc')->get(); // Order by the `created_at` column in descending order

        return view('admin.alluser.view_alluser', compact('alluser_data'));
    }

    public function view_van_location()
    {
        return view('admin.van.view_van_location');
    }

    public function view_report()
    {
        // Retrieve users with usertype 'user', ordered by latest, descending
        $report_data = Report::orderBy('created_at', 'desc')->get(); // Order by the `created_at` column in descending order

        return view('admin.report.view_report', compact("report_data"));
    }

    public function delete_report($id)
    {
        $report_data = Report::find($id);

        $report_data->delete();

        return redirect()->back();
    }



    public function view_forum()
    {

        return view("admin.forum.view_forum");
    }

    public function view_van_info()
    {
        // Retrieve users with usertype 'user', ordered by latest, descending
        $van_data = Van::orderBy('created_at', 'desc')->get(); // Order by the `created_at` column in descending order

        return view("admin.van_info.view_van_info", compact('van_data'));
    }

    //schedule

    public function view_schedule()
    {
        // Retrieve users with usertype 'user', ordered by latest, descending
        $schedule_data = Schedule::orderBy('created_at', 'desc')->get(); // Order by the `created_at` column in descending order

        return view('admin.schedule.view_schedule', compact('schedule_data'));
    }

    public function create_schedule()
    {
        return view('admin.schedule.create_schedule');
    }

    public function add_schedule(Request $request)
    {
        $schedule_data = new Schedule;

        $schedule_data->route_name = $request->route_name;
        $schedule_data->start_location = $request->start_location;
        $schedule_data->end_location = $request->end_location;
        $schedule_data->start_time = $request->start_time;
        $schedule_data->end_time = $request->end_time;
        $schedule_data->price = $request->price;
        $schedule_data->notes = $request->notes;
        $schedule_data->van_id = $request->van_id;

        $schedule_data->save();

        return redirect('view_schedule');
    }

    // public function admin_update_student($id)
    // {
    //     $students = Student::find($id);

    //     return view('admin.student.update_student', compact('students'));
    // }

    // public function admin_edit_student(Request $request, $id)
    // {

    //     $students = Student::find($id);

    //     $students->full_name = $request->full_name;
    //     $students->date_of_birth = $request->date_of_birth;
    //     $students->relationship = $request->relationship;
    //     $students->emergency_contact = $request->emergency_contact;
    //     $students->address = $request->address;
    //     $students->user_id = $request->user_id;

    //     $students->rfid_tag = $request->rfid_tag;
    //     $students->status = $request->status;


    //     $students->save();

    //     return redirect('admin_view_student');
    // }

    public function delete_schedule($id)
    {
        $schedules = Schedule::find($id);

        $schedules->delete();

        return redirect()->back();
    }
}
