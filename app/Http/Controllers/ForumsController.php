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

        return view('forum/publication')->with('publication', $publi)->with('auteur',$auteur); 
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
        
        
        Models\Commentaires::insert([
            "description"=> $requete->contenu,
            "auteur"=> auth()->user()->id,
            "created_at"=> \Carbon\Carbon::now(),
            "updated_at"=> \Carbon\Carbon::now(),
            "publi_id"=> $id



        ]);
        //$newcom = new Models\Commentaires;
        //$newcom->description = request('description');

        //$newcom->publi_id = "" ;

        //$newcom->auteur = auth()->user('name');

        //$newcom->save();
        

        //Models\Commentaires::
        

    }

}
