<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SiswaSeeder extends Seeder
{
    public function run(): void
    {
        User::updateOrCreate(
            ['username' => '0097921441'], // kunci unik
            [
                'name' => 'Reyvanno Sandova Ulul Azmi',
                'username' => '0097921441',
                'password' => Hash::make('0097921441'),
                'role' => 'siswa',
            ]
        );

        User::updateOrCreate(
            ['username' => '0083146436'],
            [
                'name' => 'Mevita Febriani',
                'username' => '0083146436',
                'password' => Hash::make('0083146436'),
                'role' => 'siswa',
            ]
        );
    }
}
