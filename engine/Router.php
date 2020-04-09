<?php


namespace app\engine;


class Router
{
    private $routes = [
        '/' => 'index@self',
        '/catalog' => 'catalog@self',
        '/catalog/card/{id}' => 'catalog@card()',
        '/basket' => 'basket@self',
        '/feedback' => 'feedback@self',
        '/api/show' => 'api@show',
        '/api/buy' => 'api@buy',
        '/api/delete' => 'api@delete',
        '/auth/login' => 'auth@login',
        '/auth/logout' => 'auth@logout',
    ];

    protected $controllerName;
    protected $actionName;
    protected $actionParams;

    public function __construct()
    {
        $this->route();
    }

    private function route()
    {
        $regExp = '/\\/(catalog)\\/(card)\\/(\\d{1,3})$/';
        $matches =[];
        $request =  $_SERVER['REQUEST_URI'];
        foreach ($this->routes as $key => $value) {
            if ($request == $key) {
                $value = explode('@', $value);
                $this->controllerName = $value[0];
                $this->actionName = $value[1];
            } elseif (preg_match($regExp, $request, $matches)) {
                $this->controllerName = $matches[1];
                $this->actionName = $matches[2];
                $this->actionParams = $matches[3];
            }
        }
    }

    public function getControllerName()
    {
        return $this->controllerName;
    }

    public function getActionName()
    {
        return $this->actionName;
    }

    public function getActionParams()
    {
        return $this->actionParams;
    }
}