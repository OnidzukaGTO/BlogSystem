<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    //protected $table = 'name table';

    protected $fillable = [
        'name','email','avatar','active','password', 'id'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $withCount = ['like'];

    public function like()
    {
        return $this->hasMany(Like::class);
    }

    /*protected $appends = ['likesCount'];

    public function getlikesCountAttribute()
    {
        return $this->likes()->count();
    }*/

    public function blogs(){
        return $this->hasMany(Blog::class);
    }
    public function comments(){
        return $this->hasMany(Comment::class);
    }

    public function likes()
    {
        return $this->belongsToMany(Blog::class, 'likes')->withPivot('is_dislike')->withTimestamps();
    }
}
