<?php

namespace Config;

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('template/(:any)', 'Home::template/$1');
$routes->get('order/(:any)/(:num)', 'Home::order/$1/$2');
$routes->post('order/process', 'Order::process');
$routes->get('invoice/(:any)', 'Order::invoice/$1');
$routes->get('invitation/(:any)', 'Invitation::show/$1');
$routes->get('wedding-invitation/(:segment)/(:segment)', 'WeddingInvitationController::showJoined/$1/$2');

// Admin routes
$routes->group('admin', function($routes) {
    $routes->get('/', 'Admin\Dashboard::index');
    $routes->get('dashboard', 'Admin\Dashboard::index');
    $routes->get('dashboard/chart-data', 'Admin\Dashboard::getChartData');
    
    $routes->get('templates', 'Admin\Template::index');
    $routes->get('templates/create', 'Admin\Template::create');
    $routes->post('templates/store', 'Admin\Template::store');
    $routes->get('templates/edit/(:num)', 'Admin\Template::edit/$1');
    $routes->post('templates/update/(:num)', 'Admin\Template::update/$1');
    $routes->get('templates/delete/(:num)', 'Admin\Template::delete/$1');
    $routes->get('templates/preview/(:num)', 'Admin\Template::preview/$1');
    
    $routes->get('orders', 'Admin\Orders::index');
    $routes->get('orders/(:any)', 'Admin\Orders::show/$1');
    $routes->post('orders/update-status', 'Admin\Orders::updateStatus');
    $routes->get('orders/delete/(:any)', 'Admin\Orders::delete/$1');
    
    $routes->get('payments', 'Admin\Payments::index');
    $routes->get('payments/(:num)', 'Admin\Payments::show/$1');
    $routes->post('payments/verify/(:num)', 'Admin\Payments::verify/$1');
    $routes->post('payments/reject/(:num)', 'Admin\Payments::reject/$1');
    $routes->get('payments/statistics', 'Admin\Payments::getStatistics');
    
    $routes->get('notifications', 'Admin\Notifications::index');
    $routes->get('notifications/(:num)', 'Admin\Notifications::show/$1');
    $routes->get('notifications/delete/(:num)', 'Admin\Notifications::delete/$1');
    $routes->post('notifications/clear-old', 'Admin\Notifications::clearOld');
    $routes->get('notifications/statistics', 'Admin\Notifications::getStatistics');
});

// Hidden routes for API endpoints
$routes->post('api/order/process', 'Order::process');
$routes->get('api/orders/(:any)', 'Order::invoice/$1');
