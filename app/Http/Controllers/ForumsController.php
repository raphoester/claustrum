<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models as Models;


class ForumsController extends Controller
{
    function publications()
    {
        
        $liste_publi = Models\Publication::all();
        return view("forum/accueil")->with('publications', $liste_publi);
    }
    
    function publication($id)
    {
        $publi = Models\Publication::select()->where('id', $id)->get();;

        return view('forum/publication')->with('publications', $publi); 
    
    }

    function newpublication()
    {
        return view('forum/newpublication');               
    }
    function insert(){
        $newpubli = new Models\Publication;
        $newpubli->titre = request('titre');
        $newpubli->description = request('description');

        $newpubli->auteur = auth()->user('name');

        $newpubli->save();
        flash('Publication publié')->success();
        return view('forum/accueil');
    }

  
    

    
}
