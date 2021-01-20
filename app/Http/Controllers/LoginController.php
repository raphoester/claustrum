<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;

class LoginController extends Controller
{
    public function logout(Request $request) {
        Auth::logout();
        return redirect('/login');
      }
}
