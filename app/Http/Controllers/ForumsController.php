<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumsController extends Controller
{
    function index()
    {
        return view('forum/accueil');
    }
    public function focus_categorie($catego)
    {
        $liste_defis = Models\Defi::select()->where('category', $catego)->get();
        return view("defis/focus_catego")->with('defis', $liste_defis);
    }

    
}
