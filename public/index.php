<?php

use Dotenv\Dotenv;
use Hb\SkyblogSlayevalphp\Core\Router;
use Hb\SkyblogSlayevalphp\Routes;

require  __DIR__."/../vendor/autoload.php";



$dotenv = Dotenv::createImmutable('..');
$dotenv->load();

$router = new Router(Routes::defineRoutes());

$router->init();
