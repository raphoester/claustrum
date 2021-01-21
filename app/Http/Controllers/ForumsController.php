<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ForumsController extends Controller
{
    function index()
    {
        return view('forum/accueil');
    }
}
