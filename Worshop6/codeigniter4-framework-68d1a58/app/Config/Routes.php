<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('db-test', 'Home::dbTest');

$routes->get('carreras', 'Carrera::index');
$routes->get('carreras/create', 'Carrera::create');
$routes->post('carreras/store', 'Carrera::store');
$routes->get('carreras/edit/(:num)', 'Carrera::edit/$1');
$routes->post('carreras/update/(:num)', 'Carrera::update/$1');
$routes->get('carreras/delete/(:num)', 'Carrera::delete/$1');

$routes->get('estudiantes', 'Estudiante::index');
$routes->get('estudiantes/create', 'Estudiante::create');
$routes->post('estudiantes/store', 'Estudiante::store');
$routes->get('estudiantes/edit/(:num)', 'Estudiante::edit/$1');
$routes->post('estudiantes/update/(:num)', 'Estudiante::update/$1');
$routes->get('estudiantes/delete/(:num)', 'Estudiante::delete/$1');