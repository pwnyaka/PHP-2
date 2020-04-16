<?php


namespace app\controllers;


use app\engine\App;
use app\interfaces\IRenderer;

abstract class Controller
{
    protected $action;
    protected $defaultAction = 'self';
    protected $layout = 'main';
    protected $useLayout = true;
    protected $renderer;

    public function __construct(IRenderer $renderer)
    {
        $this->renderer = $renderer;
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
        $params['auth'] = App::call()->usersRepository->isAuth();
        $params['user'] = App::call()->usersRepository->getUser();
        $params['admin'] = App::call()->usersRepository->isAdmin();
        $params['count'] = App::call()->basketRepository->getCountWhere('session_id', session_id());
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