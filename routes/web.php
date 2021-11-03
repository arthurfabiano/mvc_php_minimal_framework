<?php

    $routes = new \App\config\Routes();
    
    $routes->getRoute('', 'HomeController@index');
    $routes->getRoute('produto', 'ProdutoController@index');
