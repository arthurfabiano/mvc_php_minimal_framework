<?php

namespace App\Config;

class Routes
{
    #Cria um array com a url digitada pelo usuário
    public static function parseURL($par=null)
    {
        $url = explode('/', $_GET['url'], FILTER_SANITIZE_URL);
        if (!is_null($par))
        {
            return (array_key_exists($par, $url)) ? $url[$par] : false;
        }
        else
        {
            return $url;
        }
    }

    #Chama o controller e o metodo requisitado
    public static function getRoute($request, $action)
    {
        $url = self::parseURL(0);
        if ($url == $request)
        {
            $actionFinal    = explode('@', $action);
            $controller     = "\\App\\controllers\\{$actionFinal[0]}";
            $method         = $actionFinal[1];
            $instance       = new $controller;
            
            echo call_user_func_array([$instance, $method], self::parseURL());
        }
    }
}