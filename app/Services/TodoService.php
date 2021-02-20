<?php

namespace App\Services;

use App\Models\Todo;

class TodoService
{
    public static function get(array $data) : object
    {
        $list = Todo::where('status','>','0')
            ->orderBy($data['by'],$data['order'])
            ->limit(3)
            ->get();

        return $list;
    }

    public static function params() : array
    {
        if ($data = $_GET) {} else {
            $data = [
                'order'=>'desc',
                'by'=>'id',
                'page'=>'0',
            ];
        }

        return $data;

    }

    public static function validate(array $data)
    {
        $error = false;

        if (
            \mb_strlen( trim( $data['about'] ) ) < 4 &&
            \mb_strlen( trim( $data['name'] ) ) < 1 
        ) {
            $error = 'Имя пользователя и текст задачи должны быть не менее 2-х и 5-ти символов соответственно';
        }

        if (filter_var( trim( $data['email'] ),FILTER_VALIDATE_EMAIL) === false ) {
            $error = 'Некорректный email';
        }

        return $error;
    }

    public static function create(array $data)
    {
        try {
            $todo = new Todo;
            $todo->user_name = trim($data['user_name']);
            $todo->about = trim($data['about']);
            $todo->email = trim($data['email']);
            $todo->save();
            return $todo;
        } catch (\Throwable $th) {
            return $error = $th->getMessage();
            //return false;
        }
    }

    public static function ready(string $id)
    {
        try {

            $todo = Todo::where('id',$id)->first();
            $todo->status = 2;
            $todo->save();
            return true;
    
        } catch (\Throwable $th) {
            return false;
        }
    }
}