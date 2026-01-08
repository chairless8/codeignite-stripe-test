<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('pay', 'Payment::pay');
$routes->post('checkout', 'Payment::checkout');
$routes->get('success', 'Payment::success');
$routes->get('cancel', 'Payment::cancel');
