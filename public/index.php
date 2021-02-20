<?php

require __DIR__.'/../vendor/autoload.php';

require_once __DIR__.'/../bootstrap/config.php';

$app->route($_SERVER['REQUEST_URI'],$router);

//var_dump($_SERVER['REQUEST_URI']);