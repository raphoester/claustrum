<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    
    use HasFactory;
    protected $fillable =[
        'contenu',
        'envoyeur_id', 
        'receveur_id'
    ];
    
    public function destinataire()
    {
        return $this->belongsTo(User::class, 'receveur_id');
    }

    public function expediteur()
    {
        return $this->belongsTo(User::class, 'envoyeur_id');
    }
}
