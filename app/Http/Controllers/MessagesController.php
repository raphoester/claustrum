<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    public function nouveauMessage($id_receveur){
        $message = $_POST["message"];
        $envoyeur = auth()->user();
        $receveur = \App\Models\User::findOrFail($id_receveur);
        $envoyeur->messagesEnvoyes()->attach($receveur, ["contenu" => $message]);
        return $this->affiche_conversation($id_receveur);
    }

    public function affiche_conversation($id_interlocuteur){
        
        $interlocuteur = \App\Models\User::findOrFail($id_interlocuteur);
    
        $messages = (auth()->user()->messagesEnvoyes)->concat((auth()->user()->messagesRecus));

        // dd($messages);
        return view('messagerie/conversation')->with('interlocuteur', $interlocuteur)->with("conversation", $messages);
    }
}
