<?php

namespace App\Controllers;

use App\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        return view('home');
    }

    public function login()
    {
        return view('login');
    }

}
