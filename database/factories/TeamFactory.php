<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'user_id' => 1,

            'tournament_id' => 1,

            'name' => $this->faker->name(),

            'slug' => $this->faker->slug(),

            'email' => $this->faker->email(),

            'nomor' => $this->faker->randomNumber(5, true),

            'player1' => $this->faker->userName(),
            'player2' => $this->faker->userName(),
            'player3' => $this->faker->userName(),
            'player4' => $this->faker->userName(),
            'player5' => $this->faker->userName(),
            'player6' => $this->faker->userName(),

            'idPlayer1' => $this->faker->randomNumber(5, true),
            'idPlayer2' => $this->faker->randomNumber(5, true),
            'idPlayer3' => $this->faker->randomNumber(5, true),
            'idPlayer4' => $this->faker->randomNumber(5, true),
            'idPlayer5' => $this->faker->randomNumber(5, true),
            'idPlayer6' => $this->faker->randomNumber(5, true)
        ];
    }
}
