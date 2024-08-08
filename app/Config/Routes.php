<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('/teste', 'Home::teste');



$routes->get('cadastro', 'AuthController::mostrarPaginaCadastro');

$routes->post('cadastro', 'AuthController::realizarCadastro');


//usuario nao envia dados
$routes->get('login', 'AuthController::mostrarPaginaLogin');

//usuario envia dados
$routes->post('login', 'AuthController::realizarLogin');

$routes->get('logout', 'AuthController::logout');

$routes->get('dashboard', 'DashboardController::index');



