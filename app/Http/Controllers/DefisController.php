<?php

namespace App\Http\Controllers;

use App\Models as Models;
use Illuminate\Http\Request;

class DefisController extends Controller
{
    public function categories()
    {
        $categories = Models\Defi::getPossibleStatuses();
        return view('defis/liste_catego')->with('categories', $categories);
    }

    public function focus_categorie($catego)
    {
        $liste_defis = Models\Defi::select()->where('category', $catego)->get();
        return view("defis/focus_catego")->with('defis', $liste_defis) ;
    }

    public function focus_defi($catego, $id)
    {
        $defi = Models\Defi::select()->where('category', $catego)->where('id', $id)->get();
        return view('defis/focus_defi')->with('defi', $defi[0]);
    }
}
