<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models as Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\User as User;

class ForumsController extends Controller
{
    function publications()
    {
        
        $liste_publi = Models\Publication::all();
        
        return view("forum/accueil")->with('publications', $liste_publi);
    }
    


    function publication($id)
    {
        $publi = Models\Publication::find($id);
        
        $auteur = Models\User::find($publi->auteur);
        
        $commentaires = $publi->commentaires;
        
        
        return view('forum/publication')->with('publication', $publi)->with('auteur',$auteur)->with('com', $commentaires)->with("connecte", auth()->user()); 
    }

    function newpublication()
    {
        return view('forum/newpublication');               
    }
    function insert(){
        $newpubli = new Models\Publication;
        $newpubli->titre = request('titre');
        $newpubli->description = request('description');

        $newpubli->auteur = auth()->user()->id;
        
        $newpubli->save();
        flash('Publication publiée')->success();
        $liste_publi = Models\Publication::all();
        return view("forum/accueil")->with('publications', $liste_publi);
        
    }

    function com(Request $requete, $id)
    {

        $publication = \App\Models\Publication::findOrFail($id);


        $publication->commentaires()->create([
                "auteur"=> auth()->user()->id,
                "description"=> $requete->contenu,
                "created_at"=> \Carbon\Carbon::now(),
                "updated_at"=> \Carbon\Carbon::now(),
                
            ]
        );

        return redirect()->route('pub', ['id'=> $id]);



        

        

        
        
        

        // return view('forum/publication')->with('com', $commentaire)->with('auteur',$auteur)->with('publication', $publi);
        

    }

}
