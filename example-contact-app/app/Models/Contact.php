<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = [
        'username',
        'tel',
        'email',
        'type_design',
        'type_frontend',
        'type_backend',
        'prefecture_id',
        'receive_notification',
        'contact_detail',
    ];

    public function prefecture()
    {
        return $this->belongsTo(Prefecture::class);
    }
}
