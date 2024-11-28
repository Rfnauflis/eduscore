<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    protected static ?string $password;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        
        return [
            'name' => fake()->name(),
            'nis' => fake()->unique()->numerify('############'),
            'email' => fake()->email(),
            'contact' => fake()->unique()->numerify('############'),
            'gender' => fake()->randomElement(['Laki-Laki', 'Perempuan']),
            'password' => static::$password ??= Hash::make('password'),
        ];
    }
}
