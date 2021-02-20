<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Services\UserService;
use App\Services\TodoService;

class SiteController extends Controller
{
    public function index(string $param = null)
    {
        $isUser = UserService::isUser();

        $step = 3;

        $data = TodoService::params($step);

        $pag = TodoService::pag($data);

        $list = TodoService::get($data);

        return view('home', compact('isUser','list','data','pag') );
    }

    public function login()
    {

        if ( $isUser = UserService::isUser() ) {
            header('location: /');
        } else {
            return view('login', compact('isUser'));
        }

    }

}
