<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Student;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
                // 2nd method build-In laravel ( collect ) function
                $students = collect(
                    [
                        [
                             "name"        => "Nazmul Hassan",
                             "email" => "Developer",
                        ],
                        [
                             "name"        => "Kabila Akter",
                             "email" => "Developer",
                        ],
                        [
                             "name"        => "Nusrat Jahan",
                             "email" => "Developer",
                         ]
                     ]
                );
        
                $students->each(function($student){
                    Student::insert($student);
                });
    }
}
