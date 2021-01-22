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

    public function focus_categorie($catego)
    {
        $liste_defis = Models\Defi::select()->where('category', $catego)->get();
        return view("defis/focus_catego")->with('defis', $liste_defis);
    }

    public function focus_defi($catego, $id)
    {
        $defi = Models\Defi::select()->where('category', $catego)->where('id', $id)->get();
        return view('defis/focus_defi')->with('defi', $defi[0]);
    }

    public function validation_defi($catego, $id)
    {
        $defi = Models\Defi::select()->where('category', $catego)->where('id', $id)->first();

        if ($defi->password == $_POST['mdp_defi'])
        {
            flash("Vous avez réussi le défi !");
            auth()->user()->defisAccomplis()->attach($defi);
        }
        else
        {
            flash("Le mot de passe n'est pas le bon. Encore un petit effort !");
        }
        return view("defis/focus_defi")->with('defi', $defi);
    }
}
