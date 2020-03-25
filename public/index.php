<?php
include "../engine/Autoload.php";

use app\model\{Product, User, Order, Basket};
use app\engine\{Db, Autoload};
use app\interfaces\IModel;
use app\model\example\{RealProduct, DigitProduct, WeightProduct};

spl_autoload_register([new Autoload(), 'loadClass']);


$product = new Product(new Db());
var_dump($product instanceof IModel);
echo $product->getOne(2);


$user = new User(new Db());
echo $user->getOne(1) . '<br>';

$order = new Order(new Db());
echo $order->getOne(5);

$basket = new Basket(new Db());
echo $basket->getOne(123);

$apple = new RealProduct('яблоки', 7, 12);
echo $apple->getSum();

$soft = new DigitProduct('ПО', 4, 3500);
echo $soft->getSum();

$sand = new  WeightProduct('песок', 4, 100);
echo $sand->getSum();