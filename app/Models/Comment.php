<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    protected $fillable = [
        'content', 'blog_id', 'user_id'
    ];

    public function blogs(){
        return $this->belongsTo(Blog::class);
    }
    public function users(){
        return $this->belongsTo(User::class);
    }
}
