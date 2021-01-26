<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Abilities\HasParentModel;

class Administrateur extends User
{
    use HasparentModel;

    public static function boot(){
        parent::boot();
        static::addGlobalScope(function ($query) {
            $query->where('is_admin', true);
        });
    }
    


}
