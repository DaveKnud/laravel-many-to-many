<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UserProject>
 */
class UserProjectFactory extends Factory
{
    /**
     * Define the model's default state.
     *phpartisan migrate:refresh --sed
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->words(10),
            'description' => fake()->paragraph(100)
        ];
    }
}
