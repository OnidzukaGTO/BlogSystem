<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $withCount = ['like'];

    public function like()
    {
        return $this->hasMany(Like::class);
    }
    
    protected $fillable = [
        'title', 'content', 'published','published_at',
    ];

    protected $casts=[
        'published_at' => 'datetime',
        'published'=> 'boolean',
    ];
    
    public function users(){
        return $this->belongsToMany(User::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes')->withPivot('is_dislike')->withTimestamps();
    }
}
