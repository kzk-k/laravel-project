<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name_ja',
        'name_en',
    ];

    public function images()
    {
        return $this->belongsToMany(Image::class)->withTimestamps();
    }

    public static function getTagName()
    {
        return self::select('id', 'name_ja', 'name_en')->get();
    }

    public static function createTag(Request $request)
    {
        return self::create([
            'name_ja' => $request->name_ja,
            // TODO: データ作成時に自動的に翻訳されるデータを挿入したい
            'name_en' => $request->name_en,
        ]);
    }
}
