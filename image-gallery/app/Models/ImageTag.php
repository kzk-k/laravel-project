<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImageTag extends Model
{
    use HasFactory;

    // seeder実行時にimage_tagsになるっぽい
    protected $table = 'image_tag';

    protected $fillable = [
        'image_id',
        'tag_id',
    ];
}
