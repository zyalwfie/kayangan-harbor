<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LandingController', ['as' => 'landing.index']);
$routes->get('about', 'LandingController::about', ['as' => 'landing.about']);
$routes->get('tickets', 'LandingController::tickets', ['as' => 'landing.tickets']);
$routes->get('contact', 'LandingController::contact', ['as' => 'landing.contact']);

$routes->group('order', [
    'filter' => 'login',
    'filter' => 'role:user'
], static function ($routes) {
    $routes->post('/', 'OrderController::store', ['as' => 'order.store']);
    $routes->get('detail/(:num)', 'OrderController::index/$1', ['as' => 'order.index']);
    $routes->post('payment/upload', 'PaymentController::upload', ['as' => 'payment.upload']);
    $routes->post('payment/update', 'PaymentController::update', ['as' => 'payment.update']);
    $routes->get('thanks', 'PaymentController::thanks', ['as' => 'order.thanks']);
});
