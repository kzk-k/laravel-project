<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BookManage>
 */
class BookManageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => fake()->realText($this->faker->numberBetween(10, 20)),
            'body' => fake()->realText(30),
            'genre' => fake()->randomElement(['PHP', 'Laravel', 'SQL']),
        ];
    }
}
