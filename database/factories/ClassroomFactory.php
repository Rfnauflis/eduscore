<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Classroom>
 */
class ClassroomFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->randomElement(['X RPL', 'XI RPL', 'XII RPL','X TKJ 1', 'X TKJ 2', 'X TKJ 3', 'XI TKJ 1','XI TKJ 2', 'XI TKJ 3','XII TKJ 1', 'XII TKJ 2', 'TKJ 3']),
        ];
    }
}
