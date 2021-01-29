<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Commentaires extends Model
{
    use HasFactory;

    protected $fillable = [
        'description',
        'auteur'
        
    ];
    public function publicationOriginale(){
        return $this->belongsTo(Publication::class);

    }
}
