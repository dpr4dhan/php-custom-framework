<?php

require_once __DIR__ .'/../vendor/autoload.php';

define('VIEW_PATH', __DIR__.'/../views');

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__.'/../');
$dotenv->load();

use App\App;
use App\Config\Config;
use App\Router;

$router = new Router();

$router->get('/', [\App\Controllers\Home::class, 'index'])
        ->get('/invoice', [\App\Controllers\Invoice::class, 'index']);

$app = new App($router, ['uri' => $_SERVER['REQUEST_URI'], 'method' => $_SERVER['REQUEST_METHOD']],
            new Config($_ENV));
$app->run();