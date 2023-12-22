<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;

class Image extends Model
{
    use HasFactory;

    protected $fillable = [
        'title_ja',
        'title_en',
        'is_hidden',
    ];

    public function tags()
    {
        return $this->belongsToMany(Tag::class)->withTimestamps();
    }

    public static function createImage(Request $request)
    {
        return self::create([
            'title_ja' => $request->title_ja,
            // TODO: データ作成時に自動的に翻訳されるデータを挿入したい
            'title_en' => $request->title_en,
            'is_hidden' => $request->is_hidden,
        ]);
    }

    public function scopeSearch($query, $keyword)
    {
        if (empty($keyword)) {
            return $query;
        }

        if ($keyword === '非表示') {
            return $query->hidden();
        }

        return $query->titleJa($keyword)
            ->nameJa($keyword)
            ->orderBy('id');
    }

    public function scopeHidden($query)
    {
        return $query->where('is_hidden', 1);
    }

    public function scopeTitleJa($query, $keyword)
    {
        return $query->where('title_ja', 'like', '%'.$keyword.'%');
    }

    public function scopeNameJa($query, $keyword)
    {
        return $query->orWhereHas('tags', function ($query) use ($keyword) {
            $query->where('name_ja', 'like', '%'.$keyword.'%');
        });
    }
}
