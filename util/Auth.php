<?php
/**
 * 
 */
class Auth
{
    
    public static function handleLogin()
    {
        @session_start();

        if (!isset($_SESSION['loggedIn']) || $_SESSION['loggedIn'] == false) {
            session_destroy();
            header('location: login');
            Consoleclient::message(array("status" => "0", "message" => "Usuário não está logado!"));
            exit;
        }
    }
    
}