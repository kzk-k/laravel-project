<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\tag>
 */
class TagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            // 文字数が多過ぎない単語でcもっと分かりやすいのが他にあれば変更する
            'name_ja' => fake()->unique()->country(20),
            'name_en' => fake()->unique()->colorName(20),
        ];
    }
}
