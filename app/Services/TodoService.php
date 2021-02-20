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
}