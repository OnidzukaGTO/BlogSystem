<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    use HasFactory;

    //protected $table = 'name table';
    //protected $primaryKey = 'uuid';
    //protected $connection = 'name db';

    public $incrementing = false;

    protected $fillable = [
        'id','name',
    ];
}
