<?php

namespace Database\Seeders;

use App\Models\Van;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class VanSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Van::create([
            'license_plate' => 'ABC123',
            'capacity' => '20',
            'coor' => '',  // Sample coordinates
            'image' => '',
            'user_id' => 2,  // Assuming this refers to the ID of the user (driver)
        ]);

        Van::create([
            'license_plate' => 'ABC123',
            'capacity' => '20',
            'coor' => '',  // Sample coordinates
            'image' => '',
            'user_id' => 3,  // Assuming this refers to the ID of the user (driver)
        ]);
    }
}
