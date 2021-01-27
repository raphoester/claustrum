<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as User;
use App\Models as Models;
use Illuminate\Contracts\Mail\Mailer;

class UsersController extends Controller
{
    public function page_modif_profil()
    {   
        $user = auth()->user();
        return view('profils/modifier_profil', ['user' => $user]);
    }

    public function updateprofil(Mailer $email)
    {
        $user = User::find(auth()->user()->id);

        $colonnes = ['name', 'email'];
        foreach($colonnes as $attribut){
            if(request($attribut) != null) {
                $user->$attribut = request($attribut);
            }
        }

        if(request('mdpconfi') != null && request('mdpnv') != null && request('mdpconfi') == request('mdpnv')) 
        {
            $user->password = bcrypt(request('mdpnv'));
        }

    
        $user->save();


        $email->send('emails.modifprofil', ['username' => $user->name], function($message) use($user){

            

            $message->to($user->email)->from('claustrum@mail.com')->subject('Changement des informations confidentielles');

        });

        return view('profils/profil', ['profil' => $user])->with("connecte", auth()->user());
    }



    public function profilU($id)
    {
        $utilisateurRequis = User::findOrFail($id);



        return view('profils/profil')->with("profil", $utilisateurRequis)->with("connecte", auth()->user());
    }










}
