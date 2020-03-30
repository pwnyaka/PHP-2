<?php


namespace app\model;

use app\interfaces\Imodel;
use app\engine\Db;

abstract class Model implements IModel
{
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    public function __get($name)
    {
        return $this->$name;
    }

    public function __call($name, $arguments)
    {
        // TODO: Implement __call() method.
    }

    public function getOne($id)
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = {$id}";
        $obj = Db::getInstance()->queryOne($sql, [], static::class);
        foreach ($obj as $key => $value) {
            $this->$key = $value;
        }
//        return Db::getInstance()->queryOne($sql, [], static::class);
    }

    public function getAll()
    {
        $tableName = $this->getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public function insert()
    {
        var_dump("Вставляем товар");
        $tableName = $this->getTableName();
        $fields = '(';
        $values = '(';
        foreach ($this as $key => $value) {
            if ($key == 'id') continue;
            $fields .= '`' . $key . '`, ';
            $values .= "'" . $value . "', ";
        }
        $fields = substr($fields, 0 ,-2) . ')';
        $values = substr($values, 0 ,-2) . ')';
        $sql = "INSERT INTO {$tableName} {$fields} VALUES {$values}";
        Db::getInstance()->queryOne($sql);
        $this->id = Db::getInstance()-> lastInsertId();
        var_dump($sql);
    }

//    public function update(array $params = []) {
//        $id = $this->id;
//        $tableName = $this->getTableName();
//    }

    public function delete() {
        if (!is_null($this->id)) {
            var_dump("Удаляем товар");
            $tableName = $this->getTableName();
            $id = $this->id;
            $sql = "DELETE FROM {$tableName} WHERE id = :id";
            Db::getInstance()->execute($sql, ["id" => $id]);
        }
    }

    abstract public function getTableName();
}