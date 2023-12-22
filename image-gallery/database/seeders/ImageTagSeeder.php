<?php

namespace Database\Seeders;

use App\Models\Image;
use App\Models\ImageTag;
use App\Models\Tag;
use Illuminate\Database\Seeder;

class ImageTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ImageTag::factory(30)->create();

        $images = Image::all(); // imageSeederで生成されたすべての画像を取得
        $tagCount = Tag::count(); // 利用可能なタグの総数を取得

        foreach ($images as $image) {
            $numberOfTags = random_int(1, 3); // 1から3の間でランダムな数値を生成

            for ($i = 0; $i < $numberOfTags; $i++) {
                $tagId = random_int(1, $tagCount); // 利用可能なタグからランダムに1つ選ぶ

                ImageTag::firstOrCreate([
                    'image_id' => $image->id,
                    'tag_id' => $tagId,
                ]);
            }
        }
    }
}
