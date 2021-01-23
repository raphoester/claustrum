<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class MessagesController extends Controller
{
    public function nouveauMessage($id_receveur, Request $request){

        $receveur = \App\Models\User::findOrFail($id_receveur);
        auth()->user()->messagesEnvoyes()->create([
            'contenu' => $request->message,
            'receveur_id' => $id_receveur
        ]);

        return $this->affiche_conversation($id_receveur);
    }

    public function affiche_conversation($id_interlocuteur){
        $interlocuteur = \App\Models\User::findOrFail($id_interlocuteur);

        $messages = (auth()->user()->messagesEnvoyes)->concat((auth()->user()->messagesRecus));
        foreach($messages as $key => $message){
            if(($message->envoyeur_id != $id_interlocuteur) && ($message->receveur_id != $id_interlocuteur))
            {
                unset($messages[$key]);
            }
        }

        $messages = $messages->sortBy("created_at");

        return view('messagerie/conversation')->with('interlocuteur', $interlocuteur)->with("conversation", $messages)->with("connecte", auth()->user());
    }
}
