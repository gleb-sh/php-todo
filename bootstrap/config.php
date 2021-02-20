<?php

/* APP */

$app = new App\App;

/* session */

session_start();

/* functions  */

require_once __DIR__.'/../app/functions.php';

/* ROUTING */

$router = new App\Router;

require_once __DIR__.'/../router/web.php';

/* ORM */ 

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule;

$capsule->addConnection([
    'driver'    => 'mysql',
    'host'      => 'localhost',
    'database'  => 'dostavka',
    'username'  => 'peshkar',
    'password'  => 'abcD123!',
    'charset'   => 'utf8',
    'collation' => 'utf8_unicode_ci',
    'prefix'    => '',
]);

// Set the event dispatcher used by Eloquent models... (optional)
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;
$capsule->setEventDispatcher(new Dispatcher(new Container));

// Make this Capsule instance available globally via static methods... (optional)
$capsule->setAsGlobal();

// Setup the Eloquent ORM... (optional; unless you've used setEventDispatcher())
$capsule->bootEloquent();

