<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class AttendanceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Get some existing student IDs
        $studentIds = DB::table('students')->pluck('id')->toArray();

        // Insert 10 attendance records
        foreach (range(1, 50) as $i) {
            $studentId = $studentIds[array_rand($studentIds)];
            $student   = DB::table('students')->where('id', $studentId)->first();

            DB::table('attendances')->insert([
                'rfid_tag'   => $student->rfid_tag,      // use valid student's RFID
                'status'     => collect(['In', 'Out'])->random(),
                'student_id' => $studentId,
                'created_at' => Carbon::now()->subDays(rand(0, 5))->setTime(rand(7, 18), rand(0, 59)),
                'updated_at' => Carbon::now(),
            ]);
        }
    }
}
