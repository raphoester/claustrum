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
        $type = DB::select(DB::raw('show columns from defi_user where field = "category";' ))[0]->Type;
        preg_match('/^enum\((.*)\)$/', $type, $matches);
        $values = array();
        foreach(explode(',', $matches[1]) as $value){
            $values[] = trim($value, "'");
        }
        return $values;
    }

}
