<?php

namespace application\core;

use application\core\View;

class Router
{
    //
    protected $routes = [];
    protected $params = [];

    /*
     * Router constructor. Requires array of routes from configurations and builds pair key-value
     */
    public function __construct()
    {
        $arr = require 'application/configurations/routes.php';
        foreach ($arr as $key => $value) {
            $this->add($key, $value);
        }
    }

    /*
     * Makes $route as regular expression and add it to $routes array as key
     */
    public function add($route, $params)
    {
        $route = '#^' . $route . '$#';
        $this->routes[$route] = $params;
    }

    /*
     * Makes data validation between routes from configuration file and current url
     *
     * @return true/false
     */
    public function match()
    {
        // Get current url
        $url = trim($_SERVER['REQUEST_URI'], '/');
        // Data validation
        foreach ($this->routes as $route => $params) {
            if (preg_match($route, $url)) {
                $this->params = $params;
                return true;
            }
        }
        return false;
    }

    /*
     * Require controllers according to url
     */
    public function run()
    {
        if ($this->match()) {
            $controller_class = 'application\controllers\\' . ucfirst($this->params['controller']) . 'Controller';
            if (class_exists($controller_class)) {
                $action = $this->params['action'] . 'Action';
                if (method_exists($controller_class, $action)) {
                    $controller = new $controller_class($this->params);
                    $controller->$action();
                } else {
                    View::errorCode(404);
                }
            } else {
                View::errorCode(404);
            }
        } else {
            View::errorCode(404);
        }
    }

}
