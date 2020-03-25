<?php

namespace app\engine;

class Autoload
{

    public function loadClass($className)
    {
        $fileName = '..' . str_replace('\\', '/', substr($className, 3)) . '.php';
        var_dump($fileName);
        include $fileName;
    }

}