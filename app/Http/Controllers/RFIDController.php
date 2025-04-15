<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RFIDController extends Controller
{
    public function storeRFIDData(Request $request)
    {
        $request->validate([
            'rfid' => 'string|required',
        ]);

        $rfid = $request->input('rfid');

        // Check if the RFID tag exists in the students table
        $student = DB::table('students')->where('rfid_tag', $rfid)->first();

        if (!$student) {
            return response()->json([
                'message' => 'RFID tag not registered',
            ], 404);
        }

        // Get last attendance status
        $lastRecord = DB::table('attendances')
            ->where('rfid_tag', $rfid)
            ->orderBy('created_at', 'desc')
            ->first();

        $newStatus = ($lastRecord && $lastRecord->status === 'In') ? 'Out' : 'In';

        DB::table('attendances')->insert([
            'rfid_tag' => $rfid,
            'student_id' => $student->id, // optional, if needed
            'status' => $newStatus,
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json([
            'message' => "Attendance recorded with status: $newStatus"
        ], 201);
    }

}
