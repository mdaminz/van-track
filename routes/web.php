<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\DriverController;

route::get('/', [HomeController::class, 'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});


route::get('/home', [AdminController::class, 'index']);

//main-dashboard
route::get('/contact', [HomeController::class, 'contact']);
route::get('/about', [HomeController::class, 'about']);
route::get('/feature', [HomeController::class, 'feature']);
route::get('/service', [HomeController::class, 'service']);

//admin-dashboard

//school
route::get('/view_school', [AdminController::class, 'view_school']);
route::get('/create_school', [AdminController::class, 'create_school']);
route::post('/add_school', [AdminController::class, 'add_school']);
route::get('/update_school/{id}', [AdminController::class, 'update_school']);
route::post('/edit_school/{id}', [AdminController::class, 'edit_school']);
route::get('/delete_school/{id}', [AdminController::class, 'delete_school']);

//Attendance
route::get('/admin_view_attendance', [AdminController::class, 'admin_view_attendance']);

//Feedback
route::get('/admin_view_feedback', [AdminController::class, 'admin_view_feedback']);
route::get('/delete_feedback/{id}', [AdminController::class, 'delete_feedback']);

//Student
route::get('/admin_view_student', [AdminController::class, 'admin_view_student']);
route::get('/admin_create_student', [AdminController::class, 'admin_create_student']);
route::post('/admin_add_student', [AdminController::class, 'admin_add_student']);
route::get('/admin_update_student/{id}', [AdminController::class, 'admin_update_student']);
route::post('/admin_edit_student/{id}', [AdminController::class, 'admin_edit_student']);
route::get('/admin_delete_student/{id}', [AdminController::class, 'admin_delete_student']);

route::get('/detail_student/{id}', [AdminController::class,'detail_student']);

//manage parent
route::get('/view_parent', [AdminController::class, 'view_parent']);
route::get('/update_parent/{id}', [AdminController::class, 'update_parent']);
route::post('/edit_parent/{id}', [AdminController::class, 'edit_parent']);
route::get('/delete_parent/{id}', [AdminController::class, 'delete_parent']);

//manage driver
route::get('/view_vandriver', [AdminController::class, 'view_vandriver']);
route::get('/update_vandriver/{id}', [AdminController::class, 'update_vandriver']);
route::post('/edit_vandriver/{id}', [AdminController::class, 'edit_vandriver']);
route::get('/delete_vandriver/{id}', [AdminController::class, 'delete_vandriver']);

//manage all user
route::get('/view_alluser', [AdminController::class, 'view_alluser']);
route::get('/update_alluser/{id}', [AdminController::class, 'update_alluser']);
route::post('/edit_alluser/{id}', [AdminController::class, 'edit_alluser']);
route::get('/delete_alluser/{id}', [AdminController::class, 'delete_alluser']);

//USER-dashboard

//parent
route::get('/view_student', [HomeController::class, 'view_student']);
route::get('/create_student', [HomeController::class, 'create_student']);
route::post('/add_student', [HomeController::class, 'add_student']);
route::get('/update_student/{id}', [HomeController::class, 'update_student']);
route::post('/edit_student/{id}', [HomeController::class, 'edit_student']);
route::get('/delete_student/{id}', [HomeController::class, 'delete_student']);

//feedback
route::get('/view_feedback', [HomeController::class, 'view_feedback']);
route::get('/create_feedback', [HomeController::class, 'create_feedback']);
route::post('/add_feedback', [HomeController::class, 'add_feedback']);
route::get('/delete_feedback/{id}', [HomeController::class, 'delete_feedback']);

//parent view attendance
route::get('/parent_view_attendance', [HomeController::class, 'parent_view_attendance']);


//report and complaint


//van_location

route::get('/view_van', [AdminController::class, 'view_van']);

route::get('/view_van_location', [AdminController::class, 'view_van_location']);

//Report

route::get('/view_report', [AdminController::class, 'view_report']);

route::get('/detail_report/{id}', [AdminController::class, 'detail_report']);

route::get('/update_report/{id}', [AdminController::class, 'update_report']);
route::post('/edit_report/{id}', [AdminController::class, 'edit_report']);

route::get('/create_report', [HomeController::class, 'create_report']);
route::post('/add_report', [HomeController::class, 'add_report']);
route::get('/delete_report/{id}', [AdminController::class, 'delete_report']);

//report and complaint (User and Driver)
route::get('/user_view_report', [HomeController::class, 'user_view_report']);


//forum
route::get('/view_forum_post', [AdminController::class, 'view_forum']);
Route::post('/store_post', [AdminController::class, 'store'])->name('store_post');


//van
route::get('/view_van_info', [AdminController::class, 'view_van_info']);

route::get('/create_van_info', [AdminController::class, 'create_van_info']);
route::post('/add_van_info', [AdminController::class, 'add_van_info']);

route::get('/update_van_info/{id}', [AdminController::class, 'update_van_info']);
route::post('/edit_van_info/{id}', [AdminController::class, 'edit_van_info']);

route::get('/delete_van_info/{id}', [AdminController::class, 'delete_van_info']);


//schedule
route::get('/view_schedule', [AdminController::class, 'view_schedule']);
route::get('/create_schedule', [AdminController::class, 'create_schedule']);
route::post('/add_schedule', [AdminController::class, 'add_schedule']);
route::get('/update_schedule/{id}', [AdminController::class, 'update_schedule']);
route::post('/edit_schedule/{id}', [AdminController::class, 'edit_schedule']);
route::get('/delete_schedule/{id}', [AdminController::class, 'delete_schedule']);

//profile
route::get('/update_profile/{id}', [AdminController::class, 'update_profile']);
route::post('/edit_profile/{id}', [AdminController::class, 'edit_profile']);
route::post('/update_profile_photo/{id}', [AdminController::class, 'update_profile_photo']);
route::put('/edit_password/{id}', [AdminController::class, 'updatePassword']);

//Rates
route::get('/view_rate', [AdminController::class, 'view_rate']);
route::get('/create_rate', [AdminController::class, 'create_rate']);
route::post('/add_rate', [AdminController::class, 'add_rate']);

route::get('/update_rate/{id}', [AdminController::class, 'update_rate']);
route::post('/edit_rate/{id}', [AdminController::class, 'edit_rate']);

route::get('/delete_rate/{id}', [AdminController::class, 'delete_rate']);


//bills (Admin)
route::get('/paid_bill', [AdminController::class, 'paid_bill']);
route::get('/pending_bill', [AdminController::class, 'pending_bill']);
route::get('/unpaid_bill', [AdminController::class, 'unpaid_bill']);

route::get('/verify_bill/{id}', [AdminController::class, 'verify_bill']);
route::post('/edit_status/{id}', [AdminController::class, 'edit_status']);

route::get('/bill_receipt/{id}', [AdminController::class, 'bill_receipt']);


//bills (User)  
route::get('/user_view_bill', [HomeController::class, 'user_view_bill']);
route::get('/pay_bill/{id}', [HomeController::class, 'pay_bill']);

Route::post('/upload-receipt', [HomeController::class, 'uploadReceipt'])->name('bill.uploadReceipt');


//GPS

// routes/api.php
Route::middleware(['auth'])->post('/update-coor', [AdminController::class, 'updateCoor'])->name('update.coor');

Route::get('/view_van_location/{id}', [AdminController::class, 'viewLocation']);

//Pricing
route::get('/view_pricing', [HomeController::class, 'view_pricing']);


//view profile
route::get('/profile_detail/{id}', [AdminController::class, 'profile_detail']);

//driver view student
route::get('/driver_view_student', [DriverController::class, 'driver_view_student']);

//driver view attendance
route::get('/driver_view_attendance', [DriverController::class, 'driver_view_attendance']);