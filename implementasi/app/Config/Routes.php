<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

 $routes->get('/', 'Mahasiswa::dashboard'); // default ke dashboard
 $routes->get('dashboard', 'Mahasiswa::dashboard');
 



