<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

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

    public function accomplisseurs(){
        return $this->BelongsToMany(User::class);
    }

    public static function getPossibleStatuses(){
        $type = DB::select(DB::raw(
            "select category from defis group by(category);"
        ));
        return $type;
    }
}
