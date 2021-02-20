<?php

function abort(int $code)
{
    switch ($code) {
        case 405:
            $err = "HTTP/1.1 405 Method Not Allowed"; 
            break;
        case 404:
            $err = "HTTP/1.1 403 Forbidden";
        default:
            $err = 'HTTP/1.1 404 Not Found';
            break;
    }
    
    header($err);

    echo($err);
}

function view(string $view, array $vars = null)
{
    extract($vars);
    require_once __DIR__.'/../resources/view/layout.php';
}