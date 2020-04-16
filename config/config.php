<?php

use app\engine\{Db, Request, Session, Router};
use app\model\repositories\{BasketRepository, ProductRepository, UserRepository, OrderRepository, FeedbackRepository};

define("DS", DIRECTORY_SEPARATOR);
define("ROOT_DIR", dirname(__DIR__));
define("CONTROLLER_NAMESPACE", "app\\controllers\\");
define("TEMPLATE_DIR", dirname(__DIR__) . "/views/");
define("TWIG_TEMPLATE_DIR", dirname(__DIR__) . "/twigtemplates/");


return [
    'root_dir' =>  dirname(__DIR__),
    'templates_dir' => dirname(__DIR__) . "/twigtemplates/",
    'controllers_namespaces' => 'app\controllers\\',
    'components' => [
        'db' => [
            'class' => Db::class,
            'driver' => 'mysql',
            'host' => 'localhost',
            'login' => 'user',
            'password' => '12345',
            'database' => 'shop1',
            'charset' => 'utf8'
        ],
        'request' => [
            'class' => Request::class
        ],
        'router' => [
            'class' => Router::class
        ],
        'session' => [
            'class' => Session::class
        ],
        'repositories' => [
            'basketRepository' => [
                'class' => BasketRepository::class
            ],
            'feedbackRepository' => [
                'class' => FeedbackRepository::class
            ],
            'orderRepository' => [
                'class' => OrderRepository::class
            ],
            'productRepository' => [
                'class' => ProductRepository::class
            ],
            'usersRepository' => [
                'class' => UserRepository::class
            ]
        ]
    ]
];