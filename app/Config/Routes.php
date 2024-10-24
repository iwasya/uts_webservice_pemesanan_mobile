<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/pemesananmobil', 'Dashboard::index');
//pemesanan-mobil
$routes->get('/pemesanan-mobil', 'pemesananmobil::index');
$routes->post('/pemesanan-mobil/tambah', 'pemesananmobil::sendData');
$routes->get('/pemesanan-mobil/edit/(:num)', 'pemesananmobil::edit/$1');
$routes->post('/pemesanan-mobil/update', 'pemesananmobil::editpesananmobil');
$routes->get('/pemesanan-mobil/hapus/(:num)', 'pemesananmobil::hapus/$1');

//customer
$routes->get('/customer', 'customer::index');
$routes->post('/customer/tambah', 'customer::sendData');
$routes->get('/customer/edit/(:num)', 'customer::edit/$1');
$routes->post('/customer/update', 'customer::editpesananmobil');
$routes->get('/customer/hapus/(:num)', 'customer::hapus/$1');