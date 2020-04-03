<?php


namespace app\model;


class Feedback extends DbModel
{
    public $id;
    protected $name;
    protected $feedback;

    protected $params = [
        'name' => false,
        'feedback' => false
    ];

    public function __construct($name = null, $feedback = null)
    {
        $this->name = $name;
        $this->feedback = $feedback;
    }

    public static function getTableName()
    {
        return 'feedback';
    }
}