<?php
include realpath("../config/config.php");
include realpath("../engine/Autoload.php");

use app\model\{Product, User, Order, Basket, Feedback};
use app\engine\Autoload;
//use app\model\example\{RealProduct, DigitProduct, WeightProduct};

spl_autoload_register([new Autoload(), 'loadClass']);


//$product = new Product('ВАЗ 2110', 'Просто отечественный автомобиль.', 125000);
//$product->insert();
$product = new Product();
$product->getOne(3);
var_dump($product);
//$product->delete();


$user = new User();
$user->getOne(1);
var_dump($user);

$order = new Order();
$order->getOne(2);
var_dump($order);
