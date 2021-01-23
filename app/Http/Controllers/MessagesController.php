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

    public function liste_convs(){
        $liste_interlocuteurs = DB::table("messages")
        ->join('users as exp', 'exp.id', '=', 'messages.envoyeur_id')
        ->join('users as dst', 'dst.id', '=', 'messages.receveur_id')
        ->select('exp.name as expname', 'dst.name as dstname',  'messages.created_at', 'exp.id as expid', 'dst.id as dstid')
        ->where('exp.id', '=', auth()->user()->id)
        ->orWhere('dst.id', '=', auth()->user()->id)
        ->groupBy('dstid', 'expid')
        ->get();

        $liste_interlocuteurs->sortByDesc('created_at');

        $l_i_2_0 = array();
        $l_i_3_0 = array();
        foreach($liste_interlocuteurs as $cle => $interlocuteur)
        {
            if ($interlocuteur->expid == auth()->user()->id)
            {
                $inter_id = $interlocuteur->dstid;
            }
            else if ($interlocuteur->dstid == auth()->user()->id)
            {
                $inter_id = $interlocuteur->expid;
            }
            else{
                $inter_id = 0;
            }

            if((!in_array($inter_id, $l_i_2_0)) and $inter_id != auth()->user()->id)
            {
                $inter_complet = \App\Models\User::findOrFail($inter_id);
                array_push($l_i_2_0, $inter_id);
                array_push($l_i_3_0, $inter_complet);
            }
        }

        return view('messagerie/listeConversations')->with("interlocuteurs",$l_i_3_0);
    }
}
