<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LandingController', ['as' => 'landing.index']);
$routes->get('/about', 'LandingController::about', ['as' => 'landing.about']);
$routes->get('/tickets', 'LandingController::tickets', ['as' => 'landing.tickets']);
$routes->get('/contact', 'LandingController::contact', ['as' => 'landing.contact']);