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
    public function commentaires(){
        return $this->hasMany(Commentaires::class);
    }

    public function auteur()
    {
        return $this->belongsTo(User::class);
    }
}
