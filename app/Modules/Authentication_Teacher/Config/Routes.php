<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('authentication_teacher', ['namespace' => 'App\Modules\Authentication_Teacher\Controllers'], function ($routes) {
    $routes->add('/', 'Authentication_Teacher::index', ['filter' => 'teacherguestFilter']);
    $routes->add('authenticate', 'Authentication_Teacher::authenticate', ['filter' => 'teacherguestFilter']);
    $routes->add('register', 'Authentication_Teacher::register', ['filter' => 'teacherguestFilter']);
    $routes->add('logout', 'Authentication_Teacher::logout',['filter' => 'teacherauthFilter']);
});