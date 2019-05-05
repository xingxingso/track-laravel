<?php  
namespace System;


class Route
{
    /**
     * The route callback or array.
     * @var mixed
     */
    public $route;

    /**
     * The parameters that will passed to the route function.
     * @var array
     */
    public $parameters;

    /**
     * Create a new Route instance.
     * @param mixed $route 
     * @return void
     */
    function __construct($route, $parameters = [])
    {
        $this->route = $route;
        $this->parameters = $parameters;
    }

    /**
     * Execute the route function
     * @return mixed 
     */
    public function call()
    {
        $response = null;

        // If the route just has a callback, call it.
        if (is_callable($this->route)) {
            $response = call_user_func_array($this->route, $this->parameters);
        }
        
        // Make sure the response is a Response instance.
        $response = (! $response instanceof Response) ? new Response($response) : $response;

        return $response;
    }
}
