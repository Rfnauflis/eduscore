<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class KelasFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'kelas' => fake()->randomElement(["X RPL", "X TJKT", "X AKL", "X PM","X MP", "X DKV", "XI RPL", "XI TJKT", "XI AKL", "XI PM","XI MP", "XI DKV", "XII RPL", "XII TJKT", "XII AKL", "XII PM","XII MP", "XII DKV"]),
        ];
    }
}
