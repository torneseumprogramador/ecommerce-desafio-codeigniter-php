<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'HomeController::index');

$routes->group('api', function($routes) {
    $routes->get('clientes', 'ClientesController::index');
    $routes->get('clientes/(:segment)', 'ClientesController::show/$1');
    $routes->post('clientes', 'ClientesController::create');
    $routes->put('clientes/(:segment)', 'ClientesController::update/$1');
    $routes->patch('clientes/(:segment)', 'ClientesController::update/$1');
    $routes->delete('clientes/(:segment)', 'ClientesController::delete/$1');
});