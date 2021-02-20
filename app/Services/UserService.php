<?php

namespace App\Services;

use  App\Models\User;

class UserService
{
    public static function isUser() : bool
    {
        return isset($_SESSION['admin']);
    }

    public static function logout() : void
    {
        session_unset();
    }

    public static function login(array $data)
    {
        if ( UserService::isUser() ) {

            return false;

        } else {

            $user = User::where('name',$data['username'])->first();

            if ( password_verify( $data['password'], $user['pass'] ) ) {
    
                $_SESSION['admin'] = $user['id'];
                
                return true;
    
            } else {
                return false;
            }
    
        }

    }

}