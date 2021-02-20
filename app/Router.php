<?php

namespace App;

class Router {

    public $list = [
        'GET'=>[],
        'POST'=>[],
    ];

    public function getRoute(string $URI)
    {
        $array =  array_filter( explode('/',$URI) );

        if ( $data = $this->list[$_SERVER['REQUEST_METHOD']][$array[1]] ) {

            $contoller = new $data[0];

            $string = $data[1];

            $param = $array[2];

            $contoller->$string($param);

        } else {
            abort(404);
        }

    }

    public function get(string $route, array $data) : void
    {
        $this->list['GET'][$route] = $data;
    }

    public function post(string $route, array $data) : void
    {
        $this->list['POST'][$route] = $data;
    }
}