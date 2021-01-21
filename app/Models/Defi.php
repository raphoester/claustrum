<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Defi extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'category',
        'link',
        'level'
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];
}
