<?php

namespace App\Http\Controllers;

use App\Models\Bill;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\Auth;

use App\Models\Student;
use App\Models\Feedback;
use App\Models\School;
use App\Models\User;
use App\Models\Report;
use App\Models\Attendance;
use App\Models\Rate;


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

        $team_members = User::whereIn('id', [1, 2, 3])->get();

        return view('about', compact('userCount', 'studentCount', 'team_members'));
    }

    public function feature()
    {
        return view('feature');
    }

    public function service()
    {
        $schools = School::all();

        $feedbacks = Feedback::with('user')->get(); // Eager load students

        return view('service', compact('feedbacks', 'schools'));
    }

    public function index()
    {
        $userCount = User::count(); // Count the total number of users

        $studentCount = Student::count();

        $schools = School::all();

        $feedbacks = Feedback::with('user')->get(); // Eager load students

        $team_members = User::whereIn('id', [1, 2, 3])->get();

        return view('welcome', compact('feedbacks', 'schools', 'userCount', 'studentCount', 'team_members'));
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
        $rates = Rate::all();
        $rate = Rate::all();


        return view('user.student.create_student', compact('rates', 'rate'));
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
        $student_data->school_id = $request->school_id;
        $student_data->postcode = $request->postcode;
        $student_data->district = $request->district;

        $student_data->user_id = Auth::id();

        $student_data->rfid_tag = 'No Rfid Tag';
        $student_data->status = $request->Inactive;

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

        $rate = rate::all();

        $rates = Rate::all();

        return view('user.student.update_student', compact('student_data', 'rate','rates'));
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
        $student_data->postcode = $request->postcode;
        $student_data->district = $request->district;
        $student_data->school_id = $request->school_id;
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

        return redirect('user_view_report');
    }

    public function parent_view_attendance()
    {
        $user_id = Auth::id(); // Get the authenticated parent's ID

        // Retrieve students associated with the authenticated parent
        $students = Student::where('user_id', $user_id)->pluck('rfid_tag'); 

        // Retrieve attendance for those students, ordered by latest first
        $attendances = Attendance::whereIn('rfid_tag', $students)
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.attendance.view_attendance', compact('attendances'));
    }

    public function user_view_report(Request $request)
    {
        $user_id = Auth::id(); // Get the authenticated user's ID

        // Retrieve students' reports associated with the authenticated user, ordered by latest
        $report_data = Report::where('user_id', $user_id)
                            ->orderBy('created_at', 'desc')
                            ->get();

        return view('user.report.user_view_report', compact('report_data'));
    }

    public function user_view_bill()
    {
        $userId = auth()->id();

        // Get unpaid bills (sorted by latest)
        $unpaidBills = Bill::where('user_id', $userId)
                            ->where('status', 'Unpaid')
                            ->orderBy('created_at', 'desc')
                            ->get();

        // Get unpaid bills (sorted by latest)
        $pendingBills = Bill::where('user_id', $userId)
                            ->where('status', 'Pending')
                            ->orderBy('created_at', 'desc')
                            ->get();

        // Get paid bills (sorted by latest)
        $paidBills = Bill::where('user_id', $userId)
                        ->where('status', 'Paid')
                        ->orderBy('created_at', 'desc')
                        ->get();

        return view('user.bill.user_view_bill', compact('unpaidBills', 'paidBills', 'pendingBills'));
    }   

    public function pay_bill($id)
    {
        $bill = Bill::find($id);

        return view('user.bill.pay_bill', compact('bill'));
    }

    public function uploadReceipt(Request $request)
    {
        $request->validate([
            'bill_id' => 'required|exists:bills,id',
            'receipt' => 'required|file|mimes:jpg,jpeg,png,pdf|max:2048',
        ]);

        $bill = Bill::findOrFail($request->bill_id);

        // Store file
        $path = $request->file('receipt')->store('receipts', 'public');

        // Update bill
        $bill->receipt = $path;
        $bill->user_id = Auth::id();
        $bill->status = 'Pending'; // optional
        $bill->save();

        return redirect()->back()->with('success', 'Receipt uploaded successfully!');
    }


}
