<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Intern;
use Faker\Factory as Faker;

class InternSeeder extends Seeder
{
    public function run(): void
    {
        $faker = Faker::create('id_ID');

        for ($i = 1; $i <= 8; $i++) {
            Intern::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'phone' => $faker->numerify('08##########'),
                'school' => 'SMK Negeri ' . rand(1, 5),
                'major' => array_rand(config('internship.jurusan')),
                'divisi' => $faker->randomElement([
                    'Web Developer',
                    'Network Engineer',
                    'UI/UX Designer',
                    'Programmer'
                ]),
                'alamat' => $faker->address,
                'nisn' => $faker->numerify('00########'),
                'jenis_kelamin' => $faker->randomElement(['Laki-laki', 'Perempuan']),
                'tempat_lahir' => $faker->city,
                'tanggal_lahir' => $faker->date('Y-m-d', '2007-01-01'),
                'agama' => $faker->randomElement(['Islam', 'Kristen', 'Katolik', 'Hindu', 'Budha']),
                'foto' => null, // pakai default avatar
                'start_date' => now()->subDays(rand(5, 30)),
                'end_date' => now()->addMonths(3),
            ]);
        }
    }
}
