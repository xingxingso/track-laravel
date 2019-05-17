<?php 
namespace System;

/**
* View
*/
class View
{
    private $view;

    private $data;

    private $content;    

    public function __construct($view, $data = [])
    {
        $this->view = $view;
        $this->data = $data;

        // Get the contents of the view from the file system.
        $this->content = $this->load($view);
    }

    /**
     * Create a new view instance.
     * @param  string $view 
     * @param  array  $data 
     * @return View       
     */ 
    public static function make($view, $data = [])
    {
       return new self($view, $data); 
    }

    /**
     * Load the content of a view.
     * @param  string $view 
     * @return string       
     */ 
    public function load($view)
    {
        $path = APP_PATH.'views/'.$view.EXT;
        if (file_exists($path)) {
            return file_get_contents($path);
        }
    }

    public function get()
    {
        // echo '<pre>';
        // var_dump($this->content);
        // $text = htmlentities($this->content);
        // var_dump($text);
        // file_put_contents('./test.log', $text);
        // echo '</pre>';
        // die;
        // echo $this->content;
        echo eval("?>".$this->content);
        return '';
    }

    public function __toString()
    {
        return $this->get();
        // return '<h1>__toString</h1>';
    }
}
