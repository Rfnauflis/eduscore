<?php

namespace Database\Seeders;

use App\Models\Classroom;
use App\Models\Extraculicular;
use App\Models\Student;
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
        // User::factory(10)->create();

        Classroom::factory(10)->create();
        Student::factory(10)->create();
        Extraculicular::factory(10)->create();
    }

}
