<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\HomeController;

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

//Student
route::get('/admin_view_student', [AdminController::class, 'admin_view_student']);
route::get('/admin_create_student', [AdminController::class, 'admin_create_student']);
route::post('/admin_add_student', [AdminController::class, 'admin_add_student']);
route::get('/admin_update_student/{id}', [AdminController::class, 'admin_update_student']);
route::post('/admin_edit_student/{id}', [AdminController::class, 'admin_edit_student']);
route::get('/admin_delete_student/{id}', [AdminController::class, 'admin_delete_student']);

//manage parent
route::get('/view_parent', [AdminController::class, 'view_parent']);

//manage driver
route::get('/view_vandriver', [AdminController::class, 'view_vandriver']);
route::get('/update_vandriver/{id}', [AdminController::class, 'update_vandriver']);

//manage all user
route::get('/view_alluser', [AdminController::class, 'view_alluser']);

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
route::get('/create_report', [HomeController::class, 'create_report']);
route::post('/add_report', [HomeController::class, 'add_report']);
route::get('/delete_report/{id}', [AdminController::class, 'delete_report']);


//forum
route::get('/view_forum', [AdminController::class, 'view_forum']);


//van
route::get('/view_van_info', [AdminController::class, 'view_van_info']);

//schedule
route::get('/view_schedule', [AdminController::class, 'view_schedule']);
route::get('/create_schedule', [AdminController::class, 'create_schedule']);
route::post('/add_schedule', [AdminController::class, 'add_schedule']);
route::get('/update_schedule/{id}', [AdminController::class, 'update_schedule']);
route::post('/edit_schedule/{id}', [AdminController::class, 'edit_schedule']);
route::get('/delete_schedule/{id}', [AdminController::class, 'delete_schedule']);