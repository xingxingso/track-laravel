<?php
namespace System;

class Request
{   
    /**
     * The request URI.
     * @var string
     */
    public static $uri;

    /**
     * Get the request method.
     * @return string
     */
    public static function method()
    {
        return $_SERVER['REQUEST_METHOD'];
    }

    /**
     * Get the request URI.
     * @return string
     */
    public static function uri()
    {
        if (isset($_SERVER['PATH_INFO'])) {
            return static::$uri = $_SERVER['PATH_INFO'];
        }

        $uri = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        
        return static::$uri = $uri;
    }
}
