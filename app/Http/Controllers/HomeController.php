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
use App\Notifications\NewReportNotification;

use Illuminate\Support\Carbon;


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

        $rates = Rate::all();

        return view('service', compact('feedbacks', 'schools', 'rates'));
    }

    public function index()
    {
        $userCount = User::count(); // Count the total number of users

        $studentCount = Student::count();

        $schools = School::all();

        $rates = Rate::all();

        $feedbacks = Feedback::with('user')->get(); // Eager load students

        $team_members = User::whereIn('id', [1, 2, 3])->get();

        return view('welcome', compact('feedbacks', 'schools', 'userCount', 'studentCount', 'team_members', 'rates'));
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
        // Validate request data
        $request->validate([
            'full_name' => 'required|string|max:255',
            'date_of_birth' => 'required|date',
            'relationship' => 'required|string|max:255',
            'emergency_contact' => 'required|string|max:20',
            'address' => 'required|string|max:255',
            'postcode' => 'required|string|max:10',
            'school_id' => 'required|exists:schools,id',
            'district' => 'required|string|max:255',
            'profile_photo' => 'nullable|image|mimes:jpg,jpeg,png|max:4000', // 400 KB max
        ]);

        $student = new Student();

        $student->full_name = $request->full_name;
        $student->date_of_birth = $request->date_of_birth;
        $student->relationship = $request->relationship;
        $student->emergency_contact = $request->emergency_contact;
        $student->address = $request->address;
        $student->postcode = $request->postcode;
        $student->school_id = $request->school_id;
        $student->district = $request->district;
        $student->user_id = Auth::id();

        // Default RFID and Status
        $student->rfid_tag = 'No RFID Tag';
        $student->status = 'Inactive';

        // Match Rate by school and district
        $rate = Rate::where('district', $request->district)
            ->where('school_id', $request->school_id)
            ->first();

        $student->rate_id = $rate ? $rate->id : null;


        $image = $request->profile_photo;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->profile_photo->move('student', $imagename);

            $student->profile_photo = $imagename;
        }

        $student->save();

        return redirect('/view_student')->with('success', 'Child created successfully!');
    }

    public function getPrice(Request $request)
    {
        $schoolId = $request->school_id;
        $district = $request->district;

        $rate = Rate::where('school_id', $schoolId)
            ->where('district', $district)
            ->first();

        return response()->json(['price' => $rate ? $rate->price : null]);
    }


    public function update_student($id)
    {
        $student_data = Student::find($id);

        $rate = rate::all();

        $rates = Rate::all();

        return view('user.student.update_student', compact('student_data', 'rate', 'rates'));
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

        // ✅ Match district + school_id
        $rate = Rate::where('district', $request->district)
            ->where('school_id', $request->school_id)
            ->first();

        $student_data->rate_id = $rate ? $rate->id : 'No Rate';

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

        return redirect('view_student')->with('success', 'Child updated successfully!');
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

        return redirect('/home')->with('success', 'Feedback submitted! Somewhere, a server just smiled.');
    }

    public function delete_feedback($id)
    {
        $feedback_data = Feedback::find($id);

        $feedback_data->delete();

        return redirect()->back()->with('success', 'Feedback deleted successfully!');
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
        $report_data->resolved_at = null;

        $report_data->user_id = Auth::id();

        $report_data->image = $request->image;

        $image = $request->image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            $request->image->move('report', $imagename);

            $report_data->image = $imagename;
        }

        $report_data->save();

        // // ✅ Notify Admin(s)
        // $admins = User::where('usertype', 'admin')->get(); // make sure you have a 'role' column in users table
        // foreach ($admins as $admin) {
        //     $admin->notify(new NewReportNotification($report_data));
        // }

        return redirect('user_view_report')->with('success', 'Report created successfully!');
    }

    public function parent_view_attendance(Request $request)
    {
        $user_id = Auth::id();

        // Get all student IDs that belong to the authenticated user
        $studentIds = Student::where('user_id', $user_id)->pluck('id');

        // Check if 'today' toggle is set (1 = show today only)
        $isToday = $request->input('today') == '1';

        // Fetch attendances based on student IDs
        $attendances = Attendance::whereIn('student_id', $studentIds)
            ->when($isToday, function ($query) {
                $query->whereDate('created_at', Carbon::today());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.attendance.view_attendance', compact('attendances', 'isToday'));
    }

    public function user_view_report(Request $request)
    {
        $user_id = Auth::id(); // Get the authenticated user's ID

        // Retrieve students' reports associated with the authenticated user, ordered by latest
        $report_data = Report::where('user_id', $user_id)
            ->where('status', 'Unresolved')
            ->orderBy('created_at', 'desc')
            ->get();

        $report_history = Report::where('user_id', $user_id)
            ->where('status', 'Resolved')
            ->orderBy('created_at', 'desc')
            ->get();

        return view('user.report.user_view_report', compact('report_data', 'report_history'));
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

        return redirect()->back()->with('success', 'Thanks for paying, cutiepatootie! Our admin squad is now verifying it with serious faces ');
    }

    //pricing
    public function view_pricing()
    {
        $rates = Rate::all();

        return view('user.pricing.view_pricing', compact('rates'));
    }
}
