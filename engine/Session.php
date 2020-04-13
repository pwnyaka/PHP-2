<?php


namespace app\engine;


class Session
{
    public static function sessionStart()
    {
        session_start();
    }

    public static function setSession($key, $value)
    {
        $_SESSION[$key] = $value;
    }

    public static function getSession($key)
    {
        return $_SESSION[$key];
    }
}