<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class RFIDController extends Controller
{
    public function storeRFIDData(Request $request)
    {
        // Validate incoming data
        $request->validate([
            'rfid' => 'string',
        ]);

        // Save the RFID data to the database
        DB::table('attendances')->insert([
            'rfid_tag' => $request->input('rfid'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return response()->json(['message' => 'RFID data stored successfully'], 201);
    }
}
