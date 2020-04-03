<?php
include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

use app\model\{Product, User, Order, Basket, Feedback};
use app\engine\Autoload;

spl_autoload_register([new Autoload(), 'loadClass']);

$url_array = explode("/", $_SERVER['REQUEST_URI']);

$actionName = $url_array[2];
$controllerName = $url_array[1] ?: 'index';

$controllerClass = CONTROLLER_NAMESPACE . ucfirst($controllerName) . "Controller";

if (class_exists($controllerClass)) {
    $controller = new $controllerClass();
    $controller->runAction($actionName);
} else {
    die("Контроллер не существует.");
}

//$product = new Product('ВАЗ 2110', 'Просто отечественный автомобиль.', 125000);
//$product->insert();
//var_dump($product);
//$product->prodName = 'Десятка';
//$product->cost = 99990;
//var_dump($product);
//$product->update();

//$user = User::getOne(2);
//var_dump($user);
//
//$order = Order::getOne(1);
//var_dump($order);
