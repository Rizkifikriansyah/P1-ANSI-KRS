<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('pages', 'Pages::index');
 $routes->get('pages/index', 'Pages::index');
 $routes->get('krs/index', 'Krs::index');
 $routes->get('pages/laporan', 'Pages::laporan');
 $routes->get('/krs', 'Krs::index');
 $routes->get('/krs/create', 'Krs::create');
 $routes->post('/krs/save', 'Krs::save');
 $routes->delete('/krs/(:num)', 'Krs::delete/$1');
 $routes->get('/krs/edit/(:num)', 'Krs::edit/$1');
 $routes->post('/krs/update/(:num)', 'Krs::update/$1');
 $routes->get('/laporan', 'Laporan::index');
 $routes->get('/laporan/index', 'Laporan::index'); // Tambahan ini untuk laporan/index
 $routes->get('/laporan/cetak', 'Laporan::cetak');
 


 
 





