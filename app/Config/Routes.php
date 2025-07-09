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
    // Order
    $routes->post('/', 'OrderController::store', ['as' => 'order.store']);
    $routes->get('detail/(:num)', 'OrderController::index/$1', ['as' => 'order.index']);
    $routes->post('payment/upload', 'PaymentController::upload', ['as' => 'payment.upload']);
    $routes->post('payment/update', 'PaymentController::update', ['as' => 'payment.update']);
    $routes->get('thanks', 'PaymentController::thanks', ['as' => 'order.thanks']);
});

$routes->group('dashboard', ['filter' => 'login'], static function($routes) {

    // Admin
    $routes->group('admin', ['filter' => 'role:admin'], static function($routes) {
        $routes->get('', 'AdminController', ['as' => 'dashboard.admin.index']);

        // Order
        $routes->get('orders', 'OrderController::dashboardIndex', ['as' => 'dashboard.admin.orders.index']);
        $routes->post('orders/approve/(:num)', 'OrderController::approve/$1');
        $routes->post('orders/cancel', 'OrderController::cancel', ['as' => 'dashboard.admin.orders.cancel']);
        $routes->post('orders/notif', 'OrderController::notif', ['as' => 'dashboard.admin.orders.notif']);

        // Tickets
        $routes->get('tickets', 'TicketController', ['as' => 'dashboard.admin.tickets.index']);
        $routes->get('tickets/create', 'TicketController::create', ['as' => 'dashboard.admin.tickets.create']);
        $routes->post('tickets/store', 'TicketController::store', ['as' => 'dashboard.admin.tickets.store']);
        $routes->get('tickets/edit/(:num)', 'TicketController::edit/$1', ['as' => 'dashboard.admin.tickets.edit']);
        $routes->post('tickets/update/(:num)', 'TicketController::update/$1', ['as' => 'dashboard.admin.tickets.update']);
        $routes->post('tickets/destroy/(:num)', 'TicketController::destroy/$1', ['as' => 'dashboard.admin.tickets.destroy']);

        // Users
        $routes->get('users', 'AdminController::users', ['as' => 'dashboard.admin.users.index']);
        $routes->post('users/destroy/(:num)', 'AdminController::userDestroy/$1', ['as' => 'dashboard.admin.users.destroy']);
    });
    
    // User
    $routes->group('user', ['filter' => 'role:user'], static function($routes) {
        $routes->get('', 'UserController', ['as' => 'dashboard.user.index']);

        $routes->get('orders', 'OrderController::dashboardIndex', ['as' => 'dashboard.user.orders.index']);

        $routes->post('payment/upload', 'PaymentController::upload', ['as' => 'dashboard.user.payment.upload']);

        $routes->get('notification/read/(:num)', 'NotificationController::read/$1', ['as' => 'dashboard.user.notifications.read']);
        $routes->post('notification/destroy', 'NotificationController::destroy', ['as' => 'dashboard.user.notifications.destroy']);
    });

});
