<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Publication extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'titre',
        'description',
        'auteur',
        'created_at'
        
    ];
}
