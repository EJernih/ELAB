<?php

namespace Database\Seeders;

use App\Models\Unit;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UnitSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Unit::create([
            'id_unit' => 1,
            'name_unit' => 'meter',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Unit::create([
            'id_unit' => 2,
            'name_unit' => 'box',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
        Unit::create([
            'id_unit' => 3,
            'name_unit' => 'pcs',
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
