<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models as Models;
use Illuminate\Database\Eloquent\Model;

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

        $commentaire = Models\Commentaires::select()->where('id', $id)->get()[0];

        return view('forum/publication')->with('publication', $publi)->with('auteur',$auteur)->with('com', $commentaire); 
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

    function com(Request $requete, $id){
        $requete->publi_id = $id ;

        $commentaire = Models\Commentaires::select()->where('id', $id)->get()[0];

        $auteur = Models\Publication::find($commentaire->id);


        $publi = Models\Publication::find($id);

        

        
        
        
        Models\Commentaires::insert([
            "description"=> $requete->contenu,
            "auteur"=> auth()->user()->id,
            "created_at"=> \Carbon\Carbon::now(),
            "updated_at"=> \Carbon\Carbon::now(),
            "publi_id"=> $id

        ]);

        

        

        
        
        

        return view('forum/publication')->with('com', $commentaire)->with('auteur',$auteur)->with('publication', $publi);
        

    }

}
