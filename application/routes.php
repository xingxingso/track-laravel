<?php 

return [
    
    'GET /' => function()
    {
        return View::make('home/index');
    }, 

    'GET /uri/set/' => function ()
    {
        return '<p>test routes</p>';
    }
];
