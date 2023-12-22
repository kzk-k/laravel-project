<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Scout\Searchable;

class BookManage extends Model
{
    use HasFactory, Searchable;

    protected $fillable = [
        'genre',
        'title',
        'body',
    ];

    public function toSearchableArray(): array
    {
        return [
            'genre' => $this->genre,
            'title' => $this->title,
            'body' => $this->body,
        ];
    }
}
