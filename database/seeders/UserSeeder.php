<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menggunakan firstOrCreate dengan kondisi dan data yang akan dibuat
        $teknisi = User::firstOrCreate([
            'email' => 'teknisi@gmail.com'
        ], [
            'name' => 'Teknisi',
            'password' => Hash::make('teknisi')
        ]);
        $teknisi->assignRole('teknisi');

        $kalab = User::firstOrCreate([
            'email' => 'jernih2004@gmail.com'
        ], [
            'name' => 'Jernih',
            'password' => Hash::make('2004')
        ]);
        $kalab->assignRole('kalab');
    }
}