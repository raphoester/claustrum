<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as User;

class UsersController extends Controller
{
    public function afficherprofil(){
        $user = auth()->user();
        return view('profil', ['user' => $user]);
    }

    public function updateprofil(){

        request()->validate([
            'name' => 'required',
            'email' => 'required',
            'mdpactu' => 'required',
            'mdpnv' => 'required',
            'mdpconfi' => 'required',

        ]);

    }

    public function profilU($id){
        $utilisateurRequis = User::findOrFail($id);

        

        return view('profils/profil')->with("profil", $utilisateurRequis)->with("connecte", auth()->user());
    }
}