<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Services\UserService;

class UserController extends Controller
{
    public function login()
    {
        $data = $_POST;

        if ($user = UserService::login($data) ) {

            header('location: /');

        } else {

            $error = 'Неправильный логин или пароль';

            return view('login',compact('error'));
        }

    }

    public function logout()
    {
        if ($isUser = UserService::isUser() ) {
            UserService::logout();
        }
        return header('location: /');
    }
}