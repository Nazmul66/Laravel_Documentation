<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Teacher;

class TeacherSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

         // factory can call into seeder files


        // Teacher::factory()->count(10)->create();   1st method
        Teacher::factory(5)->create();    // 2nd method
    }
}
