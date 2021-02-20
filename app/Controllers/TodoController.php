<?php

namespace App\Controllers;

use App\Controllers\Controller;
use App\Services\UserService;
use App\Services\TodoService;

class TodoController extends Controller
{
    public function new()
    {
        $isUser = UserService::isUser();

        return view('todo/create',compact('isUser'));
    }
    public function create()
    {
        $isUser = UserService::isUser();

        $error = null;

        if ($_POST) {

            $data = $_POST;

            $error = TodoService::validate($data);

            if (!$error) {

                $todo = TodoService::create($data);

                if ( is_object($todo) ) {
                    return header('Location: /');
                } else {
                    // $error = 'Проверьте данные, есть ошибки';
                    $error = $todo;
                }

            }

            return view('todo/create',compact('data','error'));

        } else {
            return header('Location: /');
        }

    }
}