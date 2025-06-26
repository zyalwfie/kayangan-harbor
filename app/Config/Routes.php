<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LandingController', ['as' => 'landing.index']);
$routes->get('/about', 'LandingController::about', ['as' => 'landing.about']);
$routes->get('/packages', 'LandingController::packages', ['as' => 'landing.packages']);
$routes->get('/hotels', 'LandingController::hotels', ['as' => 'landing.hotels']);
$routes->get('/contact', 'LandingController::contact', ['as' => 'landing.contact']);