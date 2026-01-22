<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->name(),

            // username angka (NIP / NISN)
            'username' => fake()->numerify('##########'),

            // default password angka
            'password' => Hash::make('123456'),

            // default role siswa (aman untuk testing)
            'role' => 'siswa',
        ];
    }

    /**
     * State untuk admin (opsional)
     */
    public function admin(): static
    {
        return $this->state(fn () => [
            'role' => 'admin',
            'username' => fake()->numerify('19########'),
        ]);
    }
}
