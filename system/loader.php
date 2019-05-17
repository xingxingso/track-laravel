<?php  

return function ($class)
{
    $class = str_replace('\\', '/', $class);

    if (array_key_exists($class, $aliases = System\Config::get('application.aliases')))
    {
        return class_alias($aliases[$class], $class);
    }

    $file = strtolower($class).EXT;
    if (file_exists($path = BASE_PATH.$file)) {
        require $path;    
    }
    elseif (file_exists($path = APP_PATH.'models/'.$file)) {
        require $path;
    }
    elseif (file_exists($path = APP_PATH.'pacakges/'.$file)) {
        require $path;
    }
    elseif (file_exists($path = APP_PATH.$file)) {
        require $path;
    }
};
