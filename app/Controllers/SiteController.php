<?php

namespace App\Controllers;

use App\Controllers\Controller;

class SiteController extends Controller
{
    public function index()
    {
        echo 'Привет!';
    }
    public function viewSome(string $param)
    {
        var_dump($param);
    }
}