<?php  

return function ($class)
{
    $class = str_replace('\\', '/', $class);

    $file = strtolower($class).EXT;

    $path = BASE_PATH.$file;

    if (file_exists($path)) {
        require $path;    
    }
};
