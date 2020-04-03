<?php


namespace app\model;

use app\interfaces\Imodel;
use app\engine\Db;

abstract class Model implements IModel
{
    public function __set($name, $value)
    {
        if (array_key_exists($name, $this->params)) {
            $this->params[$name] = true;
            $this->$name = $value;
        }
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }
}