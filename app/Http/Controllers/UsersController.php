<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as User;

class UsersController extends Controller
{
    public function modifierProfil(){
        $user = auth()->user();
        return view('profil', ['user' => $user]);
    }

    public function profilU($id){
        $utilisateurRequis = User::findOrFail($id);
        return view('profils/profil')->with("profil", $utilisateurRequis)->with("connecte", auth()->user());
    }
}