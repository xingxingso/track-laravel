<?php
namespace System;

class Config
{

    /**
     * All of the loaded configuration items.
     * @var array
     */
    private static $items = [];

    /**
     * Get a configuration item.
     *
     * @param string $key
     * @return  mixed
     */
    public static function get($key)
    {
        list($file, $key) = static::parse($key);

        static::load($file);

        return static::$items[$file][$key];
    }

    /**
     * Parse a configuration key.
     * @param   string     $key 
     * @return  arr
     */
    public static function parse($key)
    {
        $segments = explode('.', $key);

        return [$segments[0], implode('.', array_slice($segments, 1))];
    }

    /**
     * Load all of the configuration items.
     * @param  string $file 
     * @return void       
     */
    public static function load($file)
    {
        if (array_key_exists($file, static::$items)) {
            return;
        }

        $path = APP_PATH.'config/'.$file.EXT;

        static::$items[$file] = require $path;
    }
}
