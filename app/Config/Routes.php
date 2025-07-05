<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'LandingController', ['as' => 'landing.index']);
$routes->get('about', 'LandingController::about', ['as' => 'landing.about']);
$routes->get('tickets', 'LandingController::tickets', ['as' => 'landing.tickets']);
$routes->get('contact', 'LandingController::contact', ['as' => 'landing.contact']);

// Order on landing
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

// Dashboard
$routes->group('dashboard', [
    'filter' => 'login'
], static function ($routes) {
    $routes->group('/', [
        'filter' => 'role:user'
    ], static function($routes) {
        $routes->get('/', 'UserController', ['as' => 'dashboard.user.index']);

        $routes->get('orders', 'UserController::orders', ['as' => 'dashboard.user.orders.index']);
    });
    
});
