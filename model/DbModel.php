<?php


namespace app\model;


use app\engine\Db;

abstract class DbModel extends Model
{
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

    public function insert()
    {
        $fields = [];
        $params = [];

        foreach ($this->params as $key => $value) {

            $params[":{$key}"] = $this->$key;
            $fields[] = "`$key`";

        }

        $fields = implode(', ', $fields);
        $values = implode(', ', array_keys($params));
        $sql = "INSERT INTO `{$this->getTableName()}` ({$fields}) VALUES ({$values})";
        Db::getInstance()->execute($sql, $params);
        $this->id = Db::getInstance()->lastInsertId();
    }

    public function update()
    {
        $fields = [];
        $params = [];

        foreach ($this->params as $key => $value) {
            if ($value) {
                $fields[] = "`{$key}` = :{$key}";
                $params[":{$key}"] = $this->$key;
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