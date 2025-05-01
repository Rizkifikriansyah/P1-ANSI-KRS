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
 

 
 





