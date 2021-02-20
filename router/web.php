<?php

use App\Controllers\SiteController;
use App\Controllers\UserController;
use App\Controllers\TodoController;


$router->get('',[SiteController::class,'index']);

$router->get('login',[SiteController::class,'login']);
$router->post('login',[UserController::class,'login']);
$router->get('logout',[UserController::class,'logout']);

$router->get('create',[TodoController::class,'new']);
$router->post('create',[TodoController::class,'create']);

$router->post('ready',[TodoController::class,'ready']);

$router->get('update',[TodoController::class,'rewrite']);
$router->post('update',[TodoController::class,'update']);