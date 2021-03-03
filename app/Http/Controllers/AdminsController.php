<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use ZipArchive;

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
        $requete->url = env('URL_DEFI', "localhost/defis_claustrum/").$requete->categorie."/defi_".$id;
        
        //craft de la bonne adresse du zip 
        $nom_zip_tmp = "defi_".$id.".zip";
        $adresse_zip_tmp = "/tmp/".$nom_zip_tmp;

        $requete->file('defi_zip')->move("/tmp/", $adresse_zip_tmp);

        $zip=new ZipArchive;
        $zip->open($adresse_zip_tmp);
        $zip->extractTo(env('STOCKAGE_DEFI', "").$requete->categorie."/defi_".$id);



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