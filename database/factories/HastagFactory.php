<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Hastag>
 */
class HastagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'tournament_id' => 1,
            'point_id' => 1,
            'hastag' => $this->faker->unique()->numberBetween(1, 16)

        ];
    }
}
