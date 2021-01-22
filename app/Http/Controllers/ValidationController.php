<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models as Models;

class ValidationController extends Controller
{
    public function validation_defi($catego, $id)
    {
        $defi = Models\Defi::select()->where('category', $catego)->where('id', $id)->first();
        $user = auth()->user();



        if ($defi->password == $_POST['mdp_defi'])
        {
            if($user->defisAccomplis->contains($id)){
                flash("La réponse est bonne, mais vous aviez déjà accompli le défi.");
            }
            else
            {
                flash("Vous avez réussi le défi !");
                $user->defisAccomplis()->attach($defi);
            }
        }
        else
        {
            flash("Le mot de passe n'est pas le bon. Encore un petit effort !");
        }
        return view("defis/focus_defi")->with('defi', $defi);
    }
}
