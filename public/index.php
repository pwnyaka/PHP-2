<?php
include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

use app\model\{Product, User, Order, Basket, Feedback};
use app\engine\{Autoload, Request, TwigRenderer, Session, Router, Renderer};
use app\model\Auth;
use app\controllers\Controller;


//spl_autoload_register([new Autoload(), 'loadClass']);

require_once realpath("../vendor/autoload.php");

try {
    $request = new Request();
    $session = new Session();
    $router = new Router();

    $session->sessionStart();

//$controllerName = $request->getControllerName() ?: 'index';
//$actionName = $request->getActionName();

    $controllerName = $router->getControllerName() ?: die('Ошибка 404. Контроллер не существует.');
    $actionName = $router->getActionName();
    $actionParams = $router->getActionParams();

    $controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
    $controller = new $controllerClass(new TwigRenderer(TWIG_TEMPLATE_DIR));
    $controller->runAction($actionName, $actionParams);
}
catch (\PDOException $exception) {
    echo $exception->getMessage();
}
catch (\Exception $exception) {
    echo $exception->getMessage() . "<br><br>";
    echo $exception->getTraceAsString();
}




