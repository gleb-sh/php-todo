<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Services\UserService;
use App\Services\TodoService;

class SiteController extends Controller
{
    public function index()
    {
        $isUser = UserService::isUser();

        $data = TodoService::params();

        $list = TodoService::get($data);

        return view('home', compact('isUser','list','data') );
    }

    public function login()
    {
        $isUser = UserService::isUser();

        return view('login', compact('isUser'));
    }

}
