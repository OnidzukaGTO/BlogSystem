<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;


    protected $fillable = [
        'user_id', 'title', 'content', 'published','published_at',
    ];

    protected $cats=[
        'published_at' => 'datetime',
        'published'=> 'boolean',
    ];
}
