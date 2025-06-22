<?php

namespace Database\Seeders;

use App\Models\Prodi;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProdiSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Prodi::create([
            'id_prodi' => 1,
            'name_prodi' => 'Teknik Informatika',
            'created_at' => now(),
            'updated_at' => now()
        ]);
        Prodi::create([
            'id_prodi' => 2,
            'name_prodi' => 'Rekayasa Keamanan Siber',
            'created_at' => now(),
            'updated_at' => now()
        ]);
    }
}
