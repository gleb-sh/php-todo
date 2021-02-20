<?php

use App\Controllers\SiteController;


$router->get('hello',[SiteController::class,'index']);

$router->get('some',[SiteController::class,'viewSome']);