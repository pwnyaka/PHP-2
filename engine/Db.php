<?php

namespace app\engine;

use app\traits\Tsingletone;


class Db
{
    use Tsingletone;

    private $config = [
        'driver' => 'mysql',
        'host' => 'localhost',
        'login' => 'user',
        'password' => '12345',
        'database' => 'shop1',
        'charset' => 'utf8'
    ];

    private $connection = null;

    private function getConnection() {
        if (is_null($this->connection)) {
            var_dump("Подключаюсь к БД!");
            $this->connection = new \PDO($this->prepareDsnString(),
                $this->config['login'],
                $this->config['password']
            );
            $this->connection->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_ASSOC);
        }
        return $this->connection;
    }

    private function queryObject($sql, $params, $class) {
        $this->getConnection()->setAttribute(\PDO::ATTR_DEFAULT_FETCH_MODE, \PDO::FETCH_CLASS);
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        $pdoStatement->setFetchMode(\PDO::FETCH_CLASS|\PDO::FETCH_PROPS_LATE, $class);
        return $pdoStatement;
    }

    private function query($sql, $params) {
        $pdoStatement = $this->getConnection()->prepare($sql);
        $pdoStatement->execute($params);
        return $pdoStatement;
    }

    public function execute($sql, $params) {
        return $this->query($sql, $params);
    }

    public function lastInsertId() {
        return $this->getConnection()->lastInsertId();
    }


    private function prepareDsnString() {
        return sprintf("%s:host=%s;dbname=%s;charset=%s",
            $this->config['driver'],
            $this->config['host'],
            $this->config['database'],
            $this->config['charset']
        );
    }

    public function queryOne($sql, $params = [], $class)
    {
        return $this->queryObject($sql, $params, $class)->fetch();
    }

    public function queryAll($sql, $params = [])
    {
        return $this->query($sql, $params)->fetchAll();
    }


}