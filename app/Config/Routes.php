<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

$routes->get('user-list', 'UserController::index');
$routes->get('user-form', 'UserController::create');
$routes->post('submit-form', 'UserController::store');
$routes->get('edit-view/(:num)', 'UserController::singleUser/$1');
$routes->post('update', 'UserController::update');
$routes->get('delete/(:num)', 'UserController::delete/$1');

$routes->get('product-list', 'ProductController::index');
$routes->get('product-form', 'ProductController::productForm');
$routes->post('submit-product', 'ProductController::storeProduct');
$routes->get('edit-product/(:num)', 'ProductController::singleProduct/$1');
$routes->post('update-product', 'ProductController::updateProduct');
$routes->get('delete-product/(:num)', 'ProductController::deleteProduct/$1');