<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models as Models;

class ForumsController extends Controller
{
    function index()
    {
        return view('forum/accueil');
    }

    function publication($publi)
    {
        return view('forum/publication');
        $liste_publi = Models\Forum::select()->where('id', $publi)->get();
        return view("forum/newpublication")->with('publications', $liste_publi);
    }
    
    function newpublication()
    {
        return view('forum/newpublication');
    }

}
