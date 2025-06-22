<?php

namespace Database\Seeders;

use App\Models\Lab;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LabSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Lab::create([
            'id_lab' => 1,
            'name_lab' => 'Lab Komputasi',
            'id_prodi' => 1,
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Lab::create([
            'id_lab' => 2,
            'name_lab' => 'Lab Sistem Informasi',
            'id_prodi' => 2,
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
