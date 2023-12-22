<?php

namespace Database\Factories;

use App\Models\Image;
use App\Models\Tag;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class ImageTagFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $image = Image::all()->random();
        $tagIds = Tag::all()->random(rand(1, 3));

        return [
            'image_id' => $image->id,
            'tag_id' => $tagIds->pluck('id')->random(),
        ];
    }
}
