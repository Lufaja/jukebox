<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Song>
 */
class SongFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => fake()->sentence,
            'author' => fake()->name,
            'releasedate' => fake()->date,
            'duration' => fake()->numberBetween(30,360),
            'genre_id' => fake()->numberBetween(1,50)
        ];
    }
}
