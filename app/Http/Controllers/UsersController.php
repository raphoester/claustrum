<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as User;

class UsersController extends Controller
{
    public function profil(){
        $users=User::all();

        return view('profil', [
            'users' => $users
        ]);
    }
}
