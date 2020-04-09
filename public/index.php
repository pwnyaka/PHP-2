<?php
include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

use app\model\{Product, User, Order, Basket, Feedback};
use app\engine\{Autoload, Request, TwigRenderer, Session, Router, Renderer};
use app\model\Auth;
use app\controllers\Controller;


spl_autoload_register([new Autoload(), 'loadClass']);

require_once  realpath("../vendor/autoload.php");

$request = new Request();
$session = new Session();
$router = new Router();

$session->sessionStart();

//$controllerName = $request->getControllerName() ?: 'index';
//$actionName = $request->getActionName();

$controllerName = $router->getControllerName() ?: 'index';
$actionName = $router->getActionName();
$actionParams = $router->getActionParams();

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRenderer(TWIG_TEMPLATE_DIR));
    $controller->runAction($actionName, $actionParams);
} else {
    die("Контроллер не существует.");
}

