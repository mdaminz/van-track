<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\Student;
use App\Models\Rate;
use App\Models\Bill;
use Carbon\Carbon;

class GenerateMonthlyBills extends Command
{
    protected $signature = 'bills:generate';
    protected $description = 'Generate monthly bills for active students';

    public function handle()
    {
        // Get all active students
        $students = Student::where('status', 'Active')->get();

        foreach ($students as $student) {
            // Check last bill date
            $lastBill = Bill::where('student_id', $student->id)->orderBy('created_at', 'desc')->first();
            
            // If no bill exists OR last bill was created 30+ days ago → Create a new bill
            if (!$lastBill || Carbon::parse($lastBill->created_at)->diffInDays(Carbon::now()) >= 30) {
                $this->generateBill($student);
            }
        }

        // Only show success message if running in console
        if ($this->output) {
            $this->info('Monthly bills generated successfully.');
        }
    }

    private function generateBill($student)
    {
        $rate = Rate::where('district', $student->district)
                    ->where('school_id', $student->school_id)
                    ->first();

        if ($rate) {
            Bill::create([
                'student_id'   => $student->id,
                'user_id'      => $student->user_id,
                'amount'       => $rate->price,
                'due_date'     => Carbon::now()->addDays(10), // Due date = 10 days after bill
                'status'       => 'Unpaid',
            ]);

            // Only log if running inside console
            if ($this->output) {
                $this->info("Bill created for student ID {$student->id} with amount {$rate->price}");
            }
        }
    }
    
}
