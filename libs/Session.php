<?php

class Session
{
    
    public static function init()
    {
        @session_start();

        if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true) {
            if (!isset($_SESSION['time'])) {
                $_SESSION['time'] = time();
            } else {
                if (time() - $_SESSION['time'] > SESSION_TIMEOUT) {
                    self::destroy();
                    //ensures that the user go to the index
                    header('location: ' . URL . 'index');
                } else {
                    $_SESSION['time'] = time();
                }
            }
        }
    }
    
    public static function set($key, $value)
    {
        $_SESSION[$key] = $value;
    }
    
    public static function setAll($session)
    {
        self::updateAll($session);
    }

    public static function updateAll($session) {
        foreach ($session as $key => $value) {
            self::set($key, $value);
        }
    }

    public static function get($key)
    {
        if (isset($_SESSION[$key])) {
            return $_SESSION[$key];
        } else {
            return null;
        }
    }
    
    public static function destroy()
    {
        @session_start();
        //unset($_SESSION);
        $_SESSION['loggedIn'] = false;
        session_destroy();
    }
    
}