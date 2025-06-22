<?php

namespace Database\Seeders;

use App\Models\Bhp;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BhpSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Bhp::create([
            'id_bhp' => 1,
            'name_bhp' => 'cat poster',
            'description' => 'faber castle',
            'minimum_stock' => 10,
            'id_unit'=> 2
        ]);
        Bhp::create([
            'id_bhp' => 2,
            'name_bhp' => 'kabel data',
            'description' => 'cat noir',
            'minimum_stock' => 5,
            'id_unit'=> 1
        ]);
    }
}
