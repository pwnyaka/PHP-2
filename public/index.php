<?php
include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

use app\model\{Product, User, Order, Basket, Feedback};
use app\engine\Autoload;
use app\engine\{TwigRenderer, Renderer};
use app\model\Auth;
use app\controllers\Controller;

session_start();

spl_autoload_register([new Autoload(), 'loadClass']);

require_once  realpath("../vendor/autoload.php");

$url_array = explode("/", $_SERVER['REQUEST_URI']);

$actionName = $url_array[2];
$controllerName = $url_array[1] ?: 'index';

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";
if (class_exists($controllerClass)) {
    $controller = new $controllerClass(new TwigRenderer(TWIG_TEMPLATE_DIR));
    if (Auth::is_auth()) {
        Controller::$authParams['auth'] = true;
        Controller::$authParams['user'] = Auth::get_user();
    }
    $controller->runAction($actionName);
} else {
    die("Контроллер не существует.");
}

