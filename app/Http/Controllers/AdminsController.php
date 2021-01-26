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
        if(\App\Models\Defi::find(1) == null){
            $id = 1;
        }
        else{
            $id = \App\Models\Defi::find(\DB::table('defis')->max('id'))->id+1;
        }

        $requete->url = "http://".env('URL_DEFI', "localhost/defis_claustrum/").$requete->categorie."/defi_".$id;
        

        $requete->file('defi_zip')->move(env('STOCKAGE_DEFI', 'C:\xampp\htdocs\defis_claustrum\\').$requete->categorie, "defi_".$id.".zip");
        
        $dossier_zip =  env('STOCKAGE_DEFI', 'C:\xampp\htdocs\defis_claustrum\\').$requete->categorie;
        $chemin_zip = env('STOCKAGE_DEFI', 'C:\xampp\htdocs\defis_claustrum\\').$requete->categorie."\defi_".$id.".zip";
                
        exec ("cd ".$dossier_zip." && mkdir defi_".$id." && tar -xf ".$chemin_zip." -C defi_".$id."&& cd .. && del defi_*.zip");

        \App\Models\Defi::insert
        ([
            'title' => $requete->titre, 
            'description' => $requete->description,
            'password' => $requete->mdp,
            'category' => $requete->categorie,
            'level' => $requete->difficulte,
            'password' => $requete->mdp,
            'link' => $requete->url,
            'created_at' =>  \Carbon\Carbon::now(),
            'updated_at' => \Carbon\Carbon::now(),
        ]);
        return $this->index();
    }

    public function liste_utilisateurs()
    {
        $utilisateurs = \App\Models\User::all();
        return view('administration/liste_utilisateurs')->with("utilisateurs", $utilisateurs);
    }

    public function liste_defis(){
        $defis = \App\Models\Defi::all();
        return view("administration/liste_defis")->with('defis', $defis);
    }
}