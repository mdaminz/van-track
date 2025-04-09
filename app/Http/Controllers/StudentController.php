<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    public function registerStudent(Request $request)
        {
            $student = Student::create($request->all());

            return response()->json(['message' => 'Student registered successfully, bill generated if active.']);
        }
}
