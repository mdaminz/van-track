<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;



class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UserSeeder::class);
        $this->call(SchoolSeeder::class);
        $this->call(VanSeeder::class);
        $this->call(RateSeeder::class);
        $this->call(StudentSeeder::class);
        $this->call(AttendanceSeeder::class);
        $this->call(BillSeeder::class); 
        $this->call(FeedbackSeeder::class);
        $this->call(ReportSeeder::class);
        $this->call(ForumSeeder::class);
    }
}
