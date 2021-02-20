<?php

function abort(int $code)
{
    switch ($code) {
        case 405:
            $err = "HTTP/1.1 405 Method Not Allowed"; 
            break;
        
        default:
            $err = 'HTTP/1.1 404 Not Found';
            break;
    }
    
    header($err);

    echo($err);
}

function view(string $view)
{
    require_once __DIR__.'/../resources/view/layout.php';
}