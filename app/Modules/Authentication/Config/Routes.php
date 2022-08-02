<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('authentication', ['namespace' => 'App\Modules\Authentication\Controllers'], function ($routes) {
    $routes->add('/', 'Authentication::index',['filter' => 'studentguestFilter']);
    $routes->add('authenticate', 'Authentication::authenticate',['filter' => 'studentguestFilter']);
    $routes->add('register', 'Authentication::register',['filter' => 'studentguestFilter']);
    $routes->add('logout', 'Authentication::logout',['filter' => 'studentauthFilter']);
});