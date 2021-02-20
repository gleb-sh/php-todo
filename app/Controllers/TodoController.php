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

            return view('todo/create',compact('isUser','data','error'));

        } else {
            return header('Location: /');
        }

    }

    public function ready(string $param)
    {
        $this->answer['status'] = TodoService::ready($param);
        $this->answerJson();
    }

    public function rewrite(string $param)
    {
        if ( $isUser = UserService::isUser() && $param) {

            $data = TodoService::getById($param);

            if ( $data['status'] === 2 ) {
                return header('Location: /');
            }

            $isRewrite = true;

            return view('todo/create',compact('isUser','data','isRewrite') );

        } else {
            return header('Location: /');
        }

    }

    public function update(string $param)
    {
        if ( $isUser = UserService::isUser() && $param) {
            
            if ($todo = TodoService::getById($param) ) {

                if ($todo['status'] === 2) {
                    return header('Location: /');
                }

                $error = null;

                if ( $data = TodoService::update($todo, $_POST) ) {
                    
                } else {
                    $data = $todo;
                    $error = 'Ошибка. Попробуйте ещё раз';
                }

                $isRewrite = true;

                return view('todo/create',compact('isUser','data','isRewrite','error') );
    
            } else {
                return header('Location: /');
            }


        } else {
            return header('Location: /');
        }
    }
}