<?php

namespace application\core;

class View
{
    public $path;
    public $route;
    public $layout_header = 'lib_header';
    public $layout_footer = 'lib_footer';
    public $path_to_current_layout = 'application/views/';
    public $path_to_layout = 'application/views/layouts/';

    /*
     * Router constructor.
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->path = $route['controller'] . '/' . $route['action'];
    }

    /*
     * Requires layouts according to route params and pass the data into thees layouts
     */
    public function render($title, $vars = [], $pagination_params = [])
    {
        extract($vars);
        extract($pagination_params);
        require $this->path_to_layout . $this->layout_header . '.php';
        require $this->path_to_current_layout . $this->path . '.php';
        require $this->path_to_layout . $this->layout_footer . '.php';
    }

    /*
     * Sets layout according to url params
     */
    public function setLayout($layout)
    {
        $this->layout_header = $layout . "_header";
        $this->layout_footer = $layout . "_footer";
    }

    /*
     * Change location of web page
     */
    public function redirect($url)
    {
        header('location: ' . $url);
        exit();
    }

    /*
     * Report about missing page and render error-page layout
     */
    public static function errorCode($code)
    {
        http_response_code($code);
        require 'application/views/error_pages/' . $code . '.php';
        exit();
    }
}
