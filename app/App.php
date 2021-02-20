<?php

namespace App;

class App
{
    public $hello = 'Привет, Мир!';

    public function hello()
    {
        echo $this->hello;
    }
}