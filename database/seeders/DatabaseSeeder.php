<?php

namespace Database\Seeders;

use App\Models\Eksra;
use App\Models\Kelas;
use App\Models\Nilai;
use App\Models\Pembina;
use App\Models\Siswa;
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

        User::factory(20)->create();
        Siswa::factory(20)->create();
        Nilai::factory(20)->create();
        Pembina::factory(20)->create();
        Eksra::factory(20)->create();
        Kelas::factory(20)->create();
    }
}
