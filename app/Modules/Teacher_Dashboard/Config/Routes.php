<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('teacher_dashboard', ['namespace' => 'App\Modules\Teacher_Dashboard\Controllers'], function ($routes) {
    $routes->add('/', 'Teacher_Dashboard::index',['filter' => 'teacherauthFilter']);
    $routes->add('create', 'Teacher_Dashboard::create',['filter' => 'teacherauthFilter']);
    $routes->add('create/(:any)', 'Teacher_Dashboard::create/$1',['filter' => 'teacherauthFilter']);
});