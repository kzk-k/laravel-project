<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\image>
 */
class ImageFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title_ja' => fake()->unique()->realText(30),
            // 90%の確率で1が入る！素敵！
            'is_hidden' => fake()->boolean(10),
        ];
    }
}
