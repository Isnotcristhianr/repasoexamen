<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

/* actualizar, recibe 2 ids */
$routes->post('updateProveedor/(:num)/(:num)', 'Home::updateProveedor/$1/$2');