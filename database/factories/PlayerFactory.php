<?php

namespace Database\Factories;

use App\Models\Team;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Player>
 */
class PlayerFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'player_name' => fake()->name(1),
            'email' => fake()->unique()->safeEmail(),
            'phone' => fake()->randomNumber(8),
            'player_note' => fake()->word(),
            'team_id' => mt_rand(1, 10),
        ];
    }
}
