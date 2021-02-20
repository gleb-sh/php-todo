<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Services\UserService;

class SiteController extends Controller
{
    public function index()
    {
        $isUser = UserService::isUser();

        return view('home', compact('isUser') );
    }

    public function login()
    {
        $isUser = UserService::isUser();

        return view('login', compact('isUser'));
    }

}
