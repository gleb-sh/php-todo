<?php

use App\Controllers\SiteController;
use App\Controllers\UserController;


$router->get('',[SiteController::class,'index']);

$router->get('login',[SiteController::class,'login']);

$router->post('login',[UserController::class,'login']);