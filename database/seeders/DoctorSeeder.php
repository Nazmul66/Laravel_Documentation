<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // 1st method
        $doctors = [
           [
                "name"        => "Nazmul Hassan",
                "description" => "Developer",
                "phone_number"       => "01868512081",
           ],
           [
                "name"        => "Nazmul Hassan",
                "description" => "Developer",
                "phone_number"       => "01868512081",
           ],
           [
                "name"        => "Nazmul Hassan",
                "description" => "Developer",
                "phone_number"       => "01868512081",
            ]
        ];

        foreach ($doctors as  $doctor) {
            Doctor::insert($doctor);
        }
 
    }
}
