<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Star>
 */
class StarFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        /**
         * Generate fake data for Star entity
         */
        return [
            'firstname' => fake()->firstName(),
            'lastname' => fake()->lastName(),
            'image' => fake()->imageUrl(),
            'description' => fake()->paragraph()
        ];
    }
}
