<?php


namespace app\model;


use app\engine\Db;
use app\engine\Session;

abstract class DbModel extends Model
{
    protected static $session;

    public static function getSession()
    {
        return static::$session = new Session();
    }

    public static function getOne($id)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->queryObject($sql, ["id" => $id], static::class);
    }

    public static function getAll()
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM {$tableName}";
        return Db::getInstance()->queryAll($sql);
    }

    public static function getLimit($from = 0, $to)
    {
        $tableName = static::getTableName();
        $sql = "SELECT * FROM `{$tableName}` LIMIT :from,  :to";
        return Db::getInstance()->queryLimit($sql, ["to" => $to, "from" => $from]);
    }

    public static function getCountWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT count(id) as count FROM {$tableName} WHERE `{$field}`=:value";
        return Db::getInstance()->queryOne($sql, ["value" => $value])['count'];
    }

    public static function getSummWhere($field, $value) {
        $tableName = static::getTableName();
        $sql = "SELECT SUM(cost) as summ FROM {$tableName} WHERE `{$field}`=:value";
        return Db::getInstance()->queryOne($sql, ["value" => $value])['summ'];
    }

    public function insert()
    {
        $fields = [];
        $params = [];

        foreach ($this->props as $key => $value) {

            $params[":{$key}"] = $this->$key;
            $fields[] = "`$key`";

        }

        $fields = implode(', ', $fields);
        $values = implode(', ', array_keys($params));
        $sql = "INSERT INTO `{$this->getTableName()}` ({$fields}) VALUES ({$values})";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

    public function save() {
        if (is_null($this->id))
            $this->insert();
        else
            $this->update();
    }

    public function update()
    {
        $fields = [];
        $params = [];

        foreach ($this->props as $key => $value) {
            if ($value) {
                $fields[] = "`{$key}` = :{$key}";
                $params[":{$key}"] = $this->$key;
                $this->props[$key] = false;
            }
        }
        $fields = implode(', ', $fields);

        $sql = "UPDATE `{$this->getTableName()}` SET {$fields} WHERE id = {$this->id}";
        Db::getInstance()->execute($sql, $params);
    }

    public function delete()
    {
        $tableName = $this->getTableName();
        $id = $this->id;
        $sql = "DELETE FROM {$tableName} WHERE id = :id";
        return Db::getInstance()->execute($sql, ["id" => $id])->rowCount();
    }

    abstract public static function getTableName();
}