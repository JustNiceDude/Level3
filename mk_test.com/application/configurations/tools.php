<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
/*
 * Prints info about variable
 */
function debug($var)
{
    echo '<pre>';
    var_dump($var);
    echo '</pre>';
}

/*
 * Deletes all dangerous symbols from string
 */
function input_data_handler($input_data)
{
    $result = strip_tags($input_data);
    $result = stripslashes($result);
    $result = trim($result);
    $result = htmlspecialchars($result);
    return $result;
}

