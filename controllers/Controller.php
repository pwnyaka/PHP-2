<?php


namespace app\controllers;


use app\engine\Db;
use app\engine\Request;
use app\interfaces\IRenderer;
use app\model\Auth;
use app\model\Basket;

abstract class Controller
{
    protected $action;
    protected $defaultAction = 'self';
    protected $layout = 'main';
    protected $useLayout = true;
    protected $renderer;
    protected $request;

    public static $authParams = [
        'auth' => false,
        'user' => ''
    ];


    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
        $this->request = new Request();
        if (Auth::is_auth()) {
            static::$authParams['auth'] = true;
            static::$authParams['user'] = Auth::get_user();
        }
    }


    public function runAction($action = null, $params = null)
    {
        $this->action = $action ?: $this->defaultAction;
        $method = "action" . ucfirst($this->action);

        if (method_exists($this, $method)) {
            $this->$method($params);
        } else {
            Die("Action не существует");
        }
    }

    public function render($template, $params = [])
    {
        $params['auth'] = static::$authParams['auth'];
        $params['user'] = static::$authParams['user'];
        $params['count'] = Basket::getCountWhere('session_id', session_id());
        if ($this->useLayout) {
            return $this->renderTemplate("layouts/{$this->layout}", [
                'menu' => $this->renderTemplate('menu', $params),
                'content' => $this->renderTemplate($template, $params)
            ]);
        } else {
            return $this->renderTemplate($template, $params);
        }

    }

    public function renderTemplate($template, $params = [])
    {
        return $this->renderer->renderTemplate($template, $params);
    }

}