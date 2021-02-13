<?php

namespace application\core;

use application\core\View;

class Controller
{

    public $route;
    public $view;
    public $model;

    /*
     * Controller constructor.
     */
    public function __construct($route)
    {
        $this->route = $route;
        $this->view = new View($route);
        $this->model = $this->loadModel($route['controller']);
    }

    /*
     * Upload models according to parameter from rout
     * @return model obj
     */
    public function loadModel($name)
    {
        $path = 'application\models\\' . ucfirst($name);
        if (class_exists($path)) {
            return new $path;
        }
    }
}
