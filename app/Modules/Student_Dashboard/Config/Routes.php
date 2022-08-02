<?php

if(!isset($routes))
{ 
    $routes = \Config\Services::routes(true);
}

$routes->group('student_dashboard', ['namespace' => 'App\Modules\Student_Dashboard\Controllers'], function ($routes) {
    $routes->add('/', 'Student_Dashboard::index',['filter' => 'studentauthFilter']);
    $routes->add('create', 'Student_Dashboard::create',['filter' => 'studentauthFilter']);
    $routes->add('create/(:any)', 'Student_Dashboard::create/$1',['filter' => 'studentauthFilter']);
});