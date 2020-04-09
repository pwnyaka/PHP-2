<?php


namespace app\engine;


class Session
{
    public function sessionStart()
    {
        session_start();
    }

    public function setSessionParams($params)
    {
        foreach ($params as $key => $value) {
            $_SESSION[$key] = $value;
        }
    }

    public function getSessionParams($key)
    {
        return $_SESSION[$key];
    }
}