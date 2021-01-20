<?php

namespace App\Http\Controllers;

use App\Models as Models;
use Illuminate\Http\Request;

class DefisController extends Controller
{
    public function categories()
    {
        return view('defis/liste_catego');
    }

    public function categorie($catego)
    {
        $liste_defis = Models\Defi::select()->where('category', $catego)->get();
        return view("defis/focus_catego")->with('defis', $liste_defis);
    }
}
