<?php

namespace Database\Seeders;

use App\Models\Unit;
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
        $this->call([
            RolePermissionSeeder::class,
            UserSeeder::class,
            UnitSeeder::class,
            BhpSeeder::class,
            ProdiSeeder::class,
            LabSeeder::class,
        ]);
    }
}
