<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DefisController extends Controller
{
    public function categories()
    {
        return view('defis/liste_catego');
    }
}
