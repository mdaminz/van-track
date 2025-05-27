<?php

namespace App\Http\Controllers;

use App\Models\Rate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\School;
use App\Models\Attendance;
use App\Models\Feedback;
use App\Models\Student;
use App\Models\Report;
use App\Models\Van;
use App\Models\Schedule;
use App\Models\Forum;
use App\Models\Bill;
use App\Models\Comment;
use App\Models\Session;

use Illuminate\Support\Facades\DB;



class AdminController extends Controller
{

    public function index()
    {

        if (Auth::id()) {

            $usertype = Auth()->user()->usertype;

            if ($usertype == 'user') {
                $user = User::find(Auth::id());

                $total_users = User::count();

                $total_students = Student::where('user_id', Auth::id())->count();


                $overdue = Bill::where('status', 'Unpaid')
                    ->where('user_id', Auth::id())
                    ->sum('amount');

                $unresolved_reports = Student::where('status', 'Unresolved')
                    ->where('user_id', Auth::id())
                    ->count();

                $user_id = Auth::id(); // Get the authenticated parent's ID

                // Retrieve students associated with the authenticated parent
                $students = Student::where('user_id', $user_id)->pluck('rfid_tag');

                // Retrieve today's attendance for those students
                $attendances = Attendance::whereIn('rfid_tag', $students)
                    ->whereDate('created_at', Carbon::today()) // Filter for today only
                    ->orderBy('created_at', 'desc')
                    ->get();

                return view('user.index', compact('user', 'total_users', 'total_students', 'overdue', 'unresolved_reports', 'attendances'));

            } else if ($usertype == 'admin') {

                $user = User::find(Auth::id());

                $total_users = User::where("status", "Active")->count();

                $total_students = Student::where("status", "Active")->count();

                // $total_active_users = Session::count();

                $vans = Van::all();

                // Calculate total paid revenue
                $paid_revenue = \App\Models\Bill::where('status', 'Paid')->sum('amount');

                $active_user = Session::count();

                $session = Session::with('user')
                    ->where('last_activity', '>=', now()->subMinutes(config('session.lifetime'))->timestamp)
                    ->whereNotNull('user_id')
                    ->take(5)
                    ->get();

                return view('admin.index', compact('total_students', 'user', 'total_users', 'paid_revenue', 'vans', 'active_user', 'active_user', 'session'));

            } else if ($usertype == 'driver') {

                $user = User::find(Auth::id());

                $total_users = User::count();

                $total_students = Student::whereHas('rate.van', function ($query) use ($user) {
                    $query->where('user_id', $user->id);
                })->count();

                $unresolved_reports = Student::where('status', 'Unresolved')
                    ->where('user_id', Auth::id())
                    ->count();

                // Calculate total paid revenue
                $paid_revenue = Bill::where('status', 'Paid')->sum('amount');

                $active_user = Session::count();

                $van = Van::where('user_id', $user)->first();

                // Fetch all rates for the user's vans
                $rates = Rate::whereIn(
                    'van_id',
                    $user->vans->pluck('id')
                )->get();

                $session = Session::with('user')
                    ->where('last_activity', '>=', now()->subMinutes(config('session.lifetime'))->timestamp)
                    ->whereNotNull('user_id')
                    ->take(5)
                    ->get();

                return view('driver.index', compact('user', 'total_users', 'total_students', 'paid_revenue', 'unresolved_reports', 'active_user', 'session', 'van', 'rates'));

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

        return redirect('view_school')->with('success', 'School created successfully!');
        ;
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

        return redirect('view_school')->with('success', 'School information updated successfully!');
        ;
    }

    public function delete_school($id)
    {
        $school_data = School::find($id);

        $school_data->delete();

        return redirect()->back()->with('success', 'School deleted successfully!');
        ;
    }

    public function admin_view_attendance(Request $request)
    {
        $query = Attendance::with(['student.school']);

        if ($request->today == 1) {
            $query->whereDate('created_at', now()->toDateString());
        }

        if ($request->filled('rate_id')) {
            $query->whereHas('student', function ($q) use ($request) {
                $q->where('rate_id', $request->rate_id);
            });
        }

        $attendances = $query->orderBy('created_at', 'desc')->get();
        $rates = Rate::with('school')->get();

        // 📅 Monthly Attendance
        $monthlyAttendance = Attendance::select(
            DB::raw("DATE_FORMAT(created_at, '%M') as month"),
            DB::raw("COUNT(*) as total")
        )
            ->groupBy(DB::raw("DATE_FORMAT(created_at, '%M')"))
            ->orderBy(DB::raw("MIN(created_at)"))
            ->get();

        // 🕒 Hourly Attendance for Today
        $hourlyAttendance = Attendance::whereDate('created_at', now())
            ->select(
                DB::raw("HOUR(created_at) as hour"),
                DB::raw("COUNT(*) as total")
            )
            ->groupBy(DB::raw("HOUR(created_at)"))
            ->orderBy('hour')
            ->get();

        return view('admin.attendance.view_attendance', compact(
            'attendances',
            'rates',
            'monthlyAttendance',
            'hourlyAttendance'
        ));
    }

    public function attendance_detail(Request $request, $id)
    {
        $student = Student::findOrFail($id);
        $isToday = $request->today == 1;

        $attendance = $student->attendances()
            ->when($isToday, function ($query) {
                $query->whereDate('created_at', now()->toDateString());
            })
            ->orderBy('created_at', 'desc')
            ->get();

        return view('admin.attendance.attendance_detail', compact('student', 'attendance', 'isToday'));
    }




    public function admin_view_feedback()
    {
        $feedback_data = Feedback::all();

        $ratingCounts = DB::table('feedback')
            ->select('rating', DB::raw('COUNT(*) as total'))
            ->groupBy('rating')
            ->orderBy('rating')
            ->get();

        $total_feedback = Feedback::count();

        $fivestar = Feedback::where('rating', 5)->count();

        return view('admin.feedback.view_feedback', compact('feedback_data', 'ratingCounts', 'total_feedback', 'fivestar'));
    }

    public function delete_feedback($id)
    {
        $fedback_data = Feedback::find($id);

        $fedback_data->delete();

        return redirect()->back()->with('success', 'Feedback deleted successfully!');
        ;
    }

    public function admin_view_student()
    {
        // Retrieve users with usertype 'user', ordered by latest, descending
        $students = Student::orderBy('created_at', 'desc')->get(); // Order by the `created_at` column in descending order

        $total_students = Student::count();

        $totalActiveStudents = Student::where('status', 'Active')->count();

        return view('admin.student.view_student', compact('students', 'total_students', 'totalActiveStudents'));
    }

    // public function admin_create_student()
    // {
    //     return view('admin.student.create_student');
    // }

    public function admin_update_student($id)
    {
        $students = Student::find($id);

        $rate = rate::all();

        $rates = Rate::all();

        return view('admin.student.update_student', compact('students', 'rate', 'rates'));
    }

    public function admin_edit_student(Request $request, $id)
    {

        $students = Student::find($id);

        $previousStatus = $students->status; // Store the previous status before updating

        $students->full_name = $request->full_name;
        $students->date_of_birth = $request->date_of_birth;
        $students->relationship = $request->relationship;
        $students->emergency_contact = $request->emergency_contact;
        $students->address = $request->address;

        $students->school_id = $request->school_id;

        $students->postcode = $request->postcode;
        $students->district = $request->district;
        $students->user_id = $request->user_id;

        $students->rfid_tag = $request->rfid_tag;
        $students->status = $request->status;

        // ✅ Match district + school_id
        $rate = Rate::where('district', $request->district)
            ->where('school_id', $request->school_id)
            ->first();

        $students->rate_id = $rate ? $rate->id : 'No Rate';

        $students->save();

        // // Check if status was changed from anything to "Active"
        // if ($previousStatus !== 'Active' && $students->status === 'Active') {
        //     $this->generateBill($students); // ✅ Fixed: Call the private method correctly
        // }

        return redirect('admin_view_student')->with('success', 'Student Profile updated successfully!');
    }

    private function generateBill($student)
    {
        $rate = Rate::where('district', $student->district)
            ->where('school_id', $student->school_id)
            ->first();

        if ($rate) {
            Bill::create([
                'student_id' => $student->id,
                'user_id' => $student->user_id,
                'amount' => $rate->price,
                'billing_date' => Carbon::now(),
                'due_date' => Carbon::now()->addDays(10), // Due date is 10 days from billing date
                'status' => 'Unpaid',
            ]);
        }
    }

    public function admin_delete_student($id)
    {
        $students = Student::find($id);

        $students->delete();

        return redirect()->back()->with('success', 'Student Profile deleted successfully!');
        ;
    }

    public function detail_student($id)
    {
        $students = Student::findOrFail($id); // Find student by ID



        // Retrieve attendance for this student using RFID tag
        $attendance = Attendance::where('rfid_tag', $students->rfid_tag)
            ->orderBy('created_at', 'desc') // Order by latest attendance
            ->get();

        return view('admin.student.detail_student', compact('students', 'attendance'));
    }

    public function view_van()
    {
        $vans = Van::all();

        return view('admin.van.view_van', compact('vans'));
    }

    public function view_parent()
    {
        // Retrieve users with usertype 'user', ordered by latest, descending
        $parent_data = User::where('usertype', 'user')
            ->orderBy('created_at', 'desc') // Order by the `created_at` column in descending order
            ->get();

        return view('admin.parent.view_parent', compact('parent_data'));
    }

    public function update_parent($id)
    {
        $parent_data = User::find($id);

        return view('admin.parent.update_parent', compact('parent_data'));
    }

    public function edit_parent(Request $request, $id)
    {

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->address = $request->address;
        $user->status = $request->status;

        $user->save();

        return redirect('view_parent')->with('success', 'Parent profile updated successfully!');
    }

    public function delete_parent($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('success', 'Parent account deleted successfully!');
        ;
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

    public function edit_vandriver(Request $request, $id)
    {

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->status = $request->status;

        $user->save();

        return redirect('view_vandriver')->with('success', 'Van Driver profile updated successfully!');
    }

    public function delete_vandriver($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back()->with('success', 'Van Driver account deleted successfully!');
        ;
    }

    public function view_alluser()
    {
        // Retrieve users with usertype 'user', ordered by latest, descending
        $alluser_data = User::orderBy('created_at', 'desc')->get(); // Order by the `created_at` column in descending order

        $total_admin = User::where('usertype', 'admin')->count();

        $total_driver = User::where('usertype', 'driver')->count();

        $total_parent = User::where('usertype', 'user')->count();

        return view('admin.alluser.view_alluser', compact('alluser_data', 'total_admin', 'total_driver', 'total_parent'));
    }

    public function update_alluser($id)
    {
        $alluser_data = User::find($id);

        return view('admin.alluser.update_alluser', compact('alluser_data'));
    }

    public function edit_alluser(Request $request, $id)
    {

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;
        $user->address = $request->address;
        $user->status = $request->status;

        $user->usertype = $request->usertype;

        $user->save();

        return redirect('view_alluser');
    }

    public function delete_alluser($id)
    {
        $user = User::find($id);

        $user->delete();

        return redirect()->back();
    }

    // public function view_van_location()
    // {


    //     return view('admin.van.view_van_location');
    // }

    public function viewLocation($id)
    {
        $van = Van::where('user_id', $id)->first();

        if ($van && $van->coor) {
            list($lat, $lng) = explode(',', $van->coor);
            return view('admin.van.view_van_location', compact('lat', 'lng'), compact('van'));
        }

        // If no location is found, fallback to default (0,0)
        return view('admin.van.view_van_location', ['lat' => 0, 'lng' => 0], compact('van'));
    }

    public function view_report()
    {
        $report_data = Report::where('status', 'unresolved')
            ->orderBy('created_at', 'desc')
            ->get();

        $totalReports = Report::where('status', 'unresolved')
            ->orderBy('created_at', 'desc')
            ->count();

        // New reports today
        $newReportsToday = Report::where('status', 'unresolved')
            ->whereDate('created_at', Carbon::today())
            ->count();

        return view('admin.report.view_report', compact("report_data", "totalReports", "newReportsToday"));
    }

    public function view_report_history()
    {
        $report_data = Report::where('status', 'resolved')
            ->orderBy('created_at', 'desc')
            ->get();

        $totalReports = Report::where('status', 'resolved')
            ->orderBy('created_at', 'desc')
            ->count();

        $newReportsToday = Report::where('status', 'resolved')
            ->whereDate('created_at', Carbon::today())
            ->count();

        return view('admin.report.view_report_history', compact("report_data", "totalReports", "newReportsToday"));
    }


    public function detail_report($id)
    {

        $report_data = Report::find($id);

        return view('admin.report.detail_report', compact("report_data"));
    }

    public function update_report($id)
    {
        $report_data = Report::find($id);

        return view('admin.report.update_report', compact('report_data'));
    }

    public function edit_report(Request $request, $id)
    {

        $report_data = Report::find($id);

        $report_data->status = $request->status;
        $report_data->remarks = $request->remarks;
        // Set resolved_at to the current date and time


        $report_data->resolved_at = now();



        $report_data->save();

        return redirect('view_report')->with('success', 'Report updated successfully!');
    }


    public function delete_report($id)
    {
        $report_data = Report::find($id);

        $report_data->delete();

        return redirect()->back() > with('success', 'Report deleted successfully!');
    }



    public function view_forum()
    {
        $forum_data = Forum::with(['user', 'comments.user'])->orderBy('created_at', 'desc')->get();


        $user_data = User::orderBy('created_at', 'asc')->get();


        return view("admin.forum.view_forum_post", compact("forum_data", "user_data"));
    }

    public function delete_forum_post($id)
    {
        $forums = Forum::find($id);

        $forums->delete();

        return redirect()->back();
    }

    public function store(Request $request)
    {
        // Validate input
        $request->validate([
            'post_content' => 'required|string|max:5000',
            'post_image' => 'image|mimes:jpeg,png,jpg,gif|max:2048' // Validate image
        ]);

        $forum_data = new Forum;

        $forum_data->post_content = $request->post_content;
        $forum_data->date = Carbon::now()->format('d F Y'); // Example: 14 March 2025
        $forum_data->time = Carbon::now()->format('h:i A'); // Example: 10:30 AM
        $forum_data->user_id = Auth::user()->id;

        // Handle single image upload
        $image = $request->post_image;

        if ($image) {
            $imagename = time() . '.' . $image->getClientOriginalExtension();

            // Move image to 'public/forum_images'
            $image->move('forum_images', $imagename);

            // Save image path in database
            $forum_data->image = 'forum_images/' . $imagename;
        }

        $forum_data->save();

        return redirect()->back();
    }

    public function store_comment(Request $request)
    {
        $request->validate([
            'comment_text' => 'required|string|max:1000',
            'forum_id' => 'required|exists:forums,id',
        ]);

        Comment::create([
            'forum_id' => $request->forum_id,
            'user_id' => Auth::id(),
            'comment_text' => $request->comment_text,
        ]);

        return redirect()->back();
    }


    //Van Information
    public function view_van_info()
    {
        // Retrieve users with usertype 'user', ordered by latest, descending
        $van_data = Van::orderBy('created_at', 'desc')->get(); // Order by the `created_at` column in descending order

        return view("admin.van_info.view_van_info", compact('van_data'));
    }

    public function create_van_info()
    {
        $assignedDriverIds = DB::table('vans')->pluck('user_id');

        $drivers = User::where('usertype', 'driver')
            ->whereNotIn('id', $assignedDriverIds)
            ->get();

        return view('admin.van_info.create_van_info', compact('drivers'));
    }

    public function add_van_info(Request $request)
    {

        $vans = new Van;

        $vans->license_plate = $request->license_plate;
        $vans->capacity = $request->capacity;
        $vans->user_id = $request->user_id;

        $vans->save();

        return redirect('view_van_info')->with('success', 'Van created successfully!');
        ;
    }


    public function update_van_info($id)
    {
        $vans = Van::find($id);

        $assignedDriverIds = DB::table('vans')->pluck('user_id');

        $drivers = User::where('usertype', 'driver')
            ->whereNotIn('id', $assignedDriverIds)
            ->get();

        return view('admin.van_info.update_van_info', compact('vans', 'drivers'));
    }


    public function edit_van_info(Request $request, $id)
    {

        $vans = Van::find($id);

        $vans->license_plate = $request->license_plate;
        $vans->capacity = $request->capacity;
        $vans->user_id = $request->user_id;

        $vans->save();

        return redirect('view_van_info')->with('success', 'Rate information updated successfully!');
        ;
    }

    public function delete_van_info($id)
    {
        $vans = Van::find($id);

        $vans->delete();

        return redirect()->back()->with('success', 'Rate deleted successfully!');
        ;
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


    public function delete_schedule($id)
    {
        $schedules = Schedule::find($id);

        $schedules->delete();

        return redirect()->back();
    }

    public function update_profile($id)
    {
        $user = User::find($id);

        return view('admin.update_profile', compact('user'));
    }

    public function edit_profile(Request $request, $id)
    {

        $user = User::find($id);

        $user->name = $request->name;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->address = $request->address;

        $user->save();

        return back()->with('success', 'Profile updated successfully.');
    }

    // Update Profile Picture


    public function update_profile_photo(Request $request, $id)
    {
        $user = User::findOrFail($id);

        if ($request->hasFile('profile_photo')) {
            $image = $request->file('profile_photo');

            // Generate a single unique file name and use it for both storage & database
            $imageName = time() . '.' . $image->getClientOriginalExtension();

            // Define the full path
            $imagePath = 'profile_photos/' . $imageName;

            // Move the image to 'public/profile_photos' with the same name
            $image->move(public_path('profile_photos'), $imageName);

            // Delete old profile image if exists
            if ($user->profile_photo_path && file_exists(public_path($user->profile_photo_path))) {
                unlink(public_path($user->profile_photo_path));
            }

            // Save the same image name in the database
            $user->profile_photo_path = $imagePath;
            $user->save();
        }

        return redirect()->back()->with('success', 'Profile photo updated successfully!');
    }



    // Update Password
    public function updatePassword(Request $request, $id)
    {

        $user = User::findOrFail($id);

        if (!Hash::check($request->old_password, $user->password)) {
            return back()->with('error', 'Old password is incorrect.');
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return back()->with('success', 'Password updated successfully.');
    }


    // Deactivate Account
    public function deactivateAccount($id)
    {
        $user = User::findOrFail($id);
        $user->update(['status' => 'inactive']);

        Auth::logout();
        return redirect('/')->with('success', 'Your account has been deactivated.');
    }

    public function view_rate()
    {
        $rates = Rate::all();

        return view('admin.rate.view_rate', compact('rates'));
    }

    public function create_rate()
    {
        $schools = School::all();

        $vans = Van::all();

        return view('admin.rate.create_rate', compact('schools', 'vans'));
    }

    public function add_rate(Request $request)
    {
        $rate = new Rate;

        $rate->school_id = $request->school_id;
        $rate->district = $request->district;
        $rate->price = $request->price;

        $rate->van_id = $request->van_id;
        $rate->start_time = $request->start_time;
        $rate->end_time = $request->end_time;

        $rate->save();

        return redirect('view_rate')->with('success', 'Rate created successfully!');
        ;
    }

    public function update_rate($id)
    {
        $rate = Rate::find($id);

        $schools = School::all();

        $vans = Van::all();

        return view('admin.rate.update_rate', compact('rate', 'schools', 'vans'));
    }

    public function edit_rate(Request $request, $id)
    {

        $rate = Rate::find($id);

        $rate->school_id = $request->school_id;
        $rate->district = $request->district;
        $rate->price = $request->price;

        $rate->van_id = $request->van_id;
        $rate->start_time = $request->start_time;
        $rate->end_time = $request->end_time;


        $rate->save();

        return redirect('view_rate')->with('success', 'Rate information updated successfully!');
        ;
    }


    public function delete_rate($id)
    {
        $rate = Rate::find($id);

        $rate->delete();

        return redirect()->back()->with('success', 'Rate deleted successfully!');
        ;
    }

    public function paid_bill()
    {
        // Get unpaid bills (sorted by latest)
        $paidBills = Bill::where('status', 'Paid')
            ->orderBy('created_at', 'desc')
            ->get();

        $paid_bills = Bill::where('status', 'Paid')
            ->orderBy('created_at', 'desc')
            ->count();

        $total_paid = Bill::where('status', 'Paid')
            ->orderBy('created_at', 'desc')
            ->sum('amount');

        return view('admin.bill.paid_bill', compact('paidBills', 'paid_bills', 'total_paid'));
    }

    public function pending_bill()
    {
        // Get unpaid bills (sorted by latest)
        $pendingBills = Bill::where('status', 'Pending')
            ->orderBy('created_at', 'desc')
            ->get();

        $pending_bills = Bill::where('status', 'Pending')
            ->orderBy('created_at', 'desc')
            ->count();

        $total_pending = Bill::where('status', 'Pending')
            ->orderBy('created_at', 'desc')
            ->sum('amount');

        return view('admin.bill.pending_bill', compact('pendingBills', 'pending_bills', 'total_pending'));
    }

    public function unpaid_bill()
    {
        // Get unpaid bills (sorted by latest)
        $unpaidBills = Bill::where('status', 'Unpaid')
            ->orderBy('created_at', 'desc')
            ->get();

        $unpaid_bills = Bill::where('status', 'Unpaid')
            ->orderBy('created_at', 'desc')
            ->count();

        $total_unpaid = Bill::where('status', 'Unpaid')
            ->orderBy('created_at', 'desc')
            ->sum('amount');

        return view('admin.bill.unpaid_bill', compact('unpaidBills', 'unpaid_bills', 'total_unpaid'));
    }

    public function bill_receipt($id)
    {
        $bill = Bill::find($id);

        return view('admin.bill.bill_receipt', compact('bill'));
    }

    public function verify_bill($id)
    {
        $bill = Bill::find($id);

        return view('admin.bill.verify_bill', compact('bill'));
    }

    public function edit_status(Request $request, $id)
    {
        $bill = Bill::find($id);

        // Update the status
        $bill->status = $request->status;

        // If status is 'Unpaid', set receipt to null
        if ($request->status == 'Unpaid') {
            $bill->receipt = null;
        }

        // Save the changes
        $bill->save();

        return redirect()->back()->with('success', 'Status updated successfully!');
    }

    public function updateCoor(Request $request)
    {
        // Get the currently logged-in user's ID
        $userId = Auth::id();

        // Get the coordinates from the request (lat, lng)
        $coor = $request->input('coor');

        // Log the coordinates for debugging
        \Log::info("User $userId updating coordinates: $coor");

        // Find the van record for the logged-in user
        $van = Van::where('user_id', $userId)->first();

        if ($van) {
            // Update the coordinates and save to the database
            $van->coor = $coor;
            $van->save();

            // Respond back with success
            return response()->json(['success' => true]);
        }

        // If no van is found for the logged-in user
        return response()->json(['success' => false, 'message' => 'Van not found']);
    }

    public function profile_detail($id)
    {
        $users = User::findOrFail($id); // Find user by ID

        // Retrieve students associated with the authenticated user
        $students = Student::where('user_id', $id)->get();
        $count_students = $students->count();

        // Find the van(s) belonging to this user (driver)
        $vans = Van::where('user_id', $id)->pluck('id'); // returns collection of van IDs

        // Get all rates that are associated with the vans of this driver
        $rates = Rate::whereIn('van_id', $vans)->get();

        return view('profile_detail', compact('users', 'students', 'count_students', 'rates'));
    }



}
