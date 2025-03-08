<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Student;
use App\Models\Feedback;
use App\Models\School;
use App\Models\User;
use App\Models\Report;
use App\Models\Attendance;

class HomeController extends Controller
{
    //Homepage
    public function contact()
    {
        return view('contact');
    }

    public function about()
    {
        $userCount = User::count(); // Count the total number of users
        $studentCount = Student::count();

        return view('about', compact('userCount', 'studentCount'));
    }

    public function feature()
    {
        return view('feature');
    }

    public function service()
    {
        $feedbacks = Feedback::with('user')->get(); // Eager load students

        return view('service', compact('feedbacks'));
    }

    public function index()
    {
        $userCount = User::count(); // Count the total number of users
        $studentCount = Student::count();

        $schools = School::all();

        $feedbacks = Feedback::with('user')->get(); // Eager load students

        return view('welcome', compact('feedbacks', 'schools', 'userCount', 'studentCount'));
    }


    //student
    public function view_student()
    {
        $user_type = Auth::user()->usertype;

        $user_id = Auth::id(); // Get the authenticated user's ID

        // Check if the usertype is 'user'
        if ($user_type === 'user') {
            // Retrieve students associated with the authenticated user
            $students = Student::where('user_id', $user_id)->get();

            // Pass the students to the view
            return view('user.student.view_student', compact('students'));
        } elseif ($user_type === 'admin') {
            $students = Student::whereHas('user', function ($query) {
                $query->where('usertype', 'user');
            })->get();

            return view('user.student.view_student', compact('students'));
        }
    }


    public function create_student()
    {
        return view('user.student.create_student');
    }

    public function add_student(Request $request)
    {
        $user = Auth::user();


        $student_data = new Student;

        $student_data->full_name = $request->full_name;
        $student_data->date_of_birth = $request->date_of_birth;
        $student_data->relationship = $request->relationship;
        $student_data->emergency_contact = $request->emergency_contact;
        $student_data->address = $request->address;

        $student_data->user_id = Auth::id();


        $student_data->profile_photo = $request->profile_photo;
        $image = $request->profile_photo;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->profile_photo->move('student', $imagename);

            $student_data->profile_photo = $imagename;
        }

        $student_data->save();

        return redirect('view_student');
    }

    public function update_student($id)
    {
        $student_data = Student::find($id);

        return view('user.student.update_student', compact('student_data'));
    }

    public function edit_student(Request $request, $id)
    {
        $user = Auth::user();

        $student_data = Student::find($id);

        $student_data->full_name = $request->full_name;
        $student_data->date_of_birth = $request->date_of_birth;
        $student_data->relationship = $request->relationship;
        $student_data->emergency_contact = $request->emergency_contact;
        $student_data->address = $request->address;
        $student_data->user_id = Auth::id();

        if ($request->hasFile('profile_photo')) {
            // Delete the old profile photo (optional, if updating an existing student)
            if ($student_data->profile_photo && file_exists(public_path('student/' . $student_data->profile_photo))) {
                unlink(public_path('student/' . $student_data->profile_photo));
            }

            // Save the new profile photo
            $image = $request->file('profile_photo');
            $imagename = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('student'), $imagename);
            $student_data->profile_photo = $imagename;
        }

        $student_data->rfid_tag = 'No Rfid Tag';
        $student_data->status = 'Active';


        $student_data->save();

        return redirect('view_student');
    }

    public function delete_student($id)
    {
        $student_data = Student::find($id);

        $student_data->delete();

        return redirect()->back();
    }

    //FEEDBACK

    public function view_feedback()
    {
        $user_id = Auth::id(); // Get the authenticated user's ID

        // Retrieve students associated with the authenticated user
        $feedbacks = Feedback::where('user_id', $user_id)->get();


        return view('user.feedback.view_feedback', compact('feedbacks'));
    }

    public function create_feedback()
    {
        return view('user.feedback.create_feedback');
    }

    public function add_feedback(Request $request)
    {
        $user = Auth::user();


        $feedback_data = new Feedback;

        $feedback_data->rating = $request->rating;
        $feedback_data->message = $request->message;
        $feedback_data->user_id = Auth::id();

        $feedback_data->save();

        return redirect('view_feedback');
    }

    public function delete_feedback($id)
    {
        $feedback_data = Feedback::find($id);

        $feedback_data->delete();

        return redirect()->back();
    }

    public function view_van()
    {
        return view('user.van.view_van');
    }

    public function create_report()
    {
        return view('user.report.create_report');
    }

    public function add_report(Request $request)
    {
        $user = Auth::user();

        $report_data = new Report;

        $report_data->type = $request->type;
        $report_data->subject = $request->subject;
        $report_data->description = $request->description;
        $report_data->status = "Unresolved";
        $report_data->resolved_at = "N/A";

        $report_data->user_id = Auth::id();

        $report_data->image = $request->image;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('report', $imagename);

            $report_data->image = $imagename;
        }

        $report_data->save();

        return redirect('view_report');
    }

    public function parent_view_attendance()
    {
        $user_id = Auth::id(); // Get the authenticated user's ID

        // Retrieve students' attendance associated with the authenticated user, ordered by created_at descending
        $attendances = Attendance::where('student_id', $user_id)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.attendance.view_attendance', compact('attendances'));
    }
}
