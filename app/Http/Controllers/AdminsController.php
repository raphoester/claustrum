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

        if($requete->nvCategorie && $requete )
        {
            $requete->categorie = $requete->nvCategorie;
        }

        //création de l'url
        $requete->url = "http://".env('URL_DEFI', "localhost/defis_claustrum/").$requete->categorie."/defi_".$id;
        //déplacement du zip au bon endroit
        $requete->file('defi_zip')->move(env('STOCKAGE_DEFI', 'C:\xampp\htdocs\defis_claustrum\\').$requete->categorie, "defi_".$id.".zip");
        //fabrication des addresses définitives
        $dossier_zip =  env('STOCKAGE_DEFI', 'C:\xampp\htdocs\defis_claustrum\\').$requete->categorie;
        $chemin_zip = env('STOCKAGE_DEFI', 'C:\xampp\htdocs\defis_claustrum\\').$requete->categorie."\defi_".$id.".zip";
        //exécution d'une commande windows pour dézipper le fichier et le mettre au bon endroit.
        exec ("cd ".$dossier_zip." && mkdir defi_".$id." && tar -xf ".$chemin_zip." -C defi_".$id." && cd ".$dossier_zip." && del defi_*.zip");
        //insertion dans la BDD
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

    public function sujets_forum(){
        $sujets = \App\Models\Publication::all();
        return view('administration/liste_sujets')->with('sujets', $sujets);
    }

    public function supprimer_utilisateur($id){
        $del = \App\Models\User::findOrFail($id);
        $del->delete();
        return back();
    }

    public function supprimer_publication($id){
        $del = \App\Models\Publication::findOrFail($id);
        $del->delete();
        return back();
    }

    public function supprimer_defi($id){
        $del = \App\Models\Defi::findOrFail($id);
        $del->delete();
        return back();
    }
}