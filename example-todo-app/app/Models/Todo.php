<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // 複数代入は発生しないけど、慣れときたいので入れておく
    protected $fillable = ['title', 'body'];
}
