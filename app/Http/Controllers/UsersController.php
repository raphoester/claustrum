<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User as User;

class UsersController extends Controller
{
    public function profil(){
        $user = auth()->user();

        return view('profil', [
            'users' => $user
        ]);
    }
}
