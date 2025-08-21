<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class BillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('bills')->insert([
            ['id' => 1, 'student_id' => 1, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 10, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 2, 'student_id' => 2, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 8, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 3, 'student_id' => 3, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 10, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 4, 'student_id' => 4, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 7, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 5, 'student_id' => 5, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 10, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 6, 'student_id' => 6, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 4, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 7, 'student_id' => 7, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 12, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 8, 'student_id' => 8, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 7, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 9, 'student_id' => 9, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 6, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 10, 'student_id' => 10, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 6, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 11, 'student_id' => 11, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 5, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 12, 'student_id' => 12, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 11, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 13, 'student_id' => 13, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 11, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 14, 'student_id' => 14, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 11, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 15, 'student_id' => 15, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 8, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 16, 'student_id' => 16, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 12, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 17, 'student_id' => 17, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 7, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 18, 'student_id' => 18, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 11, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 19, 'student_id' => 19, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 4, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 20, 'student_id' => 20, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 6, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 21, 'student_id' => 21, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 4, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 22, 'student_id' => 22, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 9, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 23, 'student_id' => 23, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 13, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 24, 'student_id' => 24, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 6, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 25, 'student_id' => 25, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 13, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 26, 'student_id' => 26, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 13, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 27, 'student_id' => 27, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 11, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 28, 'student_id' => 28, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 4, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 29, 'student_id' => 29, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 6, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 30, 'student_id' => 30, 'amount' => 100.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 4, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 31, 'student_id' => 31, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 7, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 32, 'student_id' => 32, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 8, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 33, 'student_id' => 33, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 10, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 34, 'student_id' => 34, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 13, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 35, 'student_id' => 35, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 9, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 36, 'student_id' => 36, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 9, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 37, 'student_id' => 37, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 11, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 38, 'student_id' => 38, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 10, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 39, 'student_id' => 39, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Paid', 'remarks' => null, 'user_id' => 12, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
            ['id' => 40, 'student_id' => 40, 'amount' => 120.00, 'due_date' => '2025-08-28', 'status' => 'Pending', 'remarks' => null, 'user_id' => 10, 'receipt' => null, 'created_at' => '2025-08-18 11:36:48', 'updated_at' => '2025-08-18 11:36:48'],
        ]);
    }
}
