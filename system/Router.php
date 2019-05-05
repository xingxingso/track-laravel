<?php
namespace System;

class Router
{
    /**
     * All of the loaded routes.
     * @var [type]
     */
    public static $routes;

    /**
     * Search a set of routes for the route matching a method and URI.
     * @param  string $method 
     * @param  string $uri    
     * @return Route         
     */
    public static function route($method, $uri)
    {
        // Load all of the application routes.
        static::$routes = require APP_PATH.'routes'.EXT;

        // Is there an exact match for the request?
        if (isset(static::$routes[$method.' '.$uri]))
        {
            return new Route(static::$routes[$method.' '.$uri]);
        }
    }
}
