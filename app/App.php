<?php

namespace App;

use App\Router;

class App
{
    public $hello = 'Привет, Мир!';

    public function route(string $URI, object $router)
    {
       return $router->getRoute($URI);
    }
}