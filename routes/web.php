<?php

    $routes = new \App\config\Routes();
    
    $routes->getRoute('', 'HomeController@index');
    $routes->getRoute('create', 'HomeController@create');
    $routes->getRoute('update', 'HomeController@edit');
