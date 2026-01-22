<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        User::create([
            'name' => 'Reyvanno Sandova Ulul Azmi',
            'username' => '0097921441', // NISN
            'password' => Hash::make('0097921441'),
            'role' => 'siswa',
        ]);
    }
}
