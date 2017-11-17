<?php

use Core\Routing\Config;
use Core\Routing\Route;
use Core\Routing\RouteCollection;
use Core\Routing\Router;

require_once 'vendor/autoload.php';

//$app = new \Core\Boot(\Core\Request::create());

$request = \Core\Request::create();
$path = $request->getPathInfo();

//$request = \Symfony\Component\HttpFoundation\Request::createFromGlobals();
//$path = $request->getPathInfo();

$routes = new RouteCollection();
$routes->add(
    new Route(
        'test',
        '/test/{id}',
        new Config('TestController', 'test')
    )
);

$router = new Router($routes, $path);
$route = $router->boot();

echo $route->getName();