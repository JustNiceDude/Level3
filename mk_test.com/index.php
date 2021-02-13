<?php

/*
 * Inspired by this awesome dude =)
 * https://www.youtube.com/playlist?list=PLB8wmVoWIIx6yflr2Pf3jcRi-DtWi3xmk
 * https://www.youtube.com/playlist?list=PLB8wmVoWIIx6erd0Bf2_Yf-FvFi3irqB8
 *
 */

require_once 'application/configurations/tools.php';
use application\core\Router;

spl_autoload_register(function ($class) {
    $path = str_replace('\\','/',$class.'.php');
    if(file_exists($path)){
        require $path;
    }
});
session_start();

$router = new Router;
$router->run();

