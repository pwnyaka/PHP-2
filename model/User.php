<?php


namespace app\model;

class User extends DbModel
{
    protected $id;
    protected $login;
    protected $pass;
    public $hash;
    protected $role;

    protected $props = [
        'login' => false,
        'pass' => false,
        'role' => false
    ];

    public function __construct($login = null, $pass = null, $role = null)
    {
        $this->login = $login;
        $this->pass = $pass;
        $this->role = $role;
    }

    public static function getTableName()
    {
        return "users";
    }
}