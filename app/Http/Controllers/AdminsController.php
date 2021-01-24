<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AdminsController extends Controller
{
    public function index(){
        return view('administration/menu_admin');
    }

    public function creation_defi(){
        return view('administration/creerDefi');
    }

    public function creer_defi(Request $requete)
    {
        $id = \App\Models\Defi::find(\DB::table('defis')->max('id'))->id+1;
        $requete->url = env('URL_DEFI', "localhost/")."defis_claustrum/".$requete->categorie."/".$id;
        
        \App\Models\Defi::insert
        ([
            'title' => $requete->titre, 
            'description' => $requete->description,
            'password' => $requete->mdp,
            'category' => $requete->categorie,
            'level' => $requete->difficulte,
            'password' => $requete->mdp,
            'link' => $requete->url,
            'created_at' =>  \Carbon\Carbon::now(), # new \Datetime()
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        return $this->index();
    }

    public function liste_utilisateurs()
    {
        $utilisateurs = \App\Models\User::all();
        return view('administration/liste_utilisateurs')->with("utilisateurs", $utilisateurs);
    }
}