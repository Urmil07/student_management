<?php

if (!isset($routes)) {
    $routes = \Config\Services::routes(true);
}

$routes->group('teacher_profile', ['namespace' => 'App\Modules\Teacher_Profile\Controllers'], function ($routes) {
    $routes->add('/', 'Teacher_Profile::index', ['filter' => 'teacherauthFilter']);
    $routes->add('create', 'Teacher_Profile::create', ['filter' => 'teacherauthFilter']);
    $routes->add('create/(:any)', 'Teacher_Profile::create/$1', ['filter' => 'teacherauthFilter']);
});
