<?php

namespace App\Services;

use App\Models\Todo;

class TodoService
{
    public static function get(array $data) : object
    {
        $list = Todo::where('status','>','0')
            ->orderBy($data['by'],$data['order'])
            ->limit($data['step'])
            ->offset($data['offset'])
            ->get();

        return $list;
    }

    public static function count() : int
    {
        return Todo::where('status','>','0')->count();
    }

    public static function pag(array $data) : array
    {

        // подсчёт числа старниц и номера последней страницы
        $count = TodoService::count();
        $lastpage = ceil($count / ( $data['step'] )   );

        // исключение на случай, если заданная страница больше максимальной
        if ($data['page'] > ($lastpage - 1) ) {
            header('Location: /');
        }

        // базовая ссылка с параметрами
        $baseURL = '/search/?order=' . $data['order'] . '&';

        // будет ли кнопка назад
        if ($data['page'] > 0) {
            $pag['back'] = $baseURL . 'by=' . $data['by'] . '&page=' . ($data['page'] - 1);
        }

        // будет ли кнопка вперёд
        if ($data['page'] < ($lastpage - 1) ) {
            $pag['next'] = $baseURL . 'by=' . $data['by'] . '&page=' . ($data['page'] + 1);
        }

        // реверс desc/asc
        if ($data['order'] == 'desc') {
            $order = 'asc';
        } else {
            $order = 'desc';
        }

        // базовая ссылка с параметрами (+ реверс)
        $baseURL = '/search/?order=' . $order . '&';

        // назначение ссылок сортировки
        $pag['status'] = $baseURL . 'by=status&page=' . $data['page'];
        $pag['name'] = $baseURL . 'by=user_name&page=' . $data['page'];
        $pag['email'] = $baseURL . 'by=email&page=' . $data['page'];

        return $pag;
    }

    public static function params(int $step = 3) : array
    {
        if ($data = $_GET) {} else {
            $data = [
                'order'=>'desc',
                'by'=>'id',
                'page'=>'0',
            ];
        }

        $data['step'] = $step;
        $data['offset'] = ($data['page'] * $step);

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

            $todo = TodoService::getById($id);
            $todo->status = 2;
            $todo->save();
            return true;
    
        } catch (\Throwable $th) {
            return false;
        }
    }

    public static function getById(string $id) : object
    {
        return Todo::where('id',$id)->first();
    }

    public static function update(object $todo, array $data)
    {
        try {
            if ( isset($data['about']) ) {
                $todo->about = trim($data['about']);
                $todo->save();
                return $todo;
            } else {
                return false;
            }
        } catch (\Throwable $th) {
            return false;
        }
    }
}