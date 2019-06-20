<?php


/**
 * Simple Framework - a PHP micro framework for HTTP route
 * @package     Simple Framework
 * @copyright   2019 (c) Ammar Bakheit
 * @author      Ammar Bakheit
 * @license     
 * @version     0.1.0
 * 
 */
 
/**
 * autoloader 
 */



spl_autoload_register(function ($class) {
    $root = dirname(__DIR__); //get the parent directory
    $file = $root . '/' . str_replace('\\', '/', $class) . '.php';
    if(is_readable($file)) {
        require $file;
    }
});


$router = new Core\Router;

require '../App/Config/Routes.php';
function callback_function($routes_array) {

    return $routes_array;
};

$reoutes_collections = array_map('callback_function', $routes );

foreach($reoutes_collections as $single_route) {
   // print_r($single_route);
    //echo '<hr>';

    if(empty($single_route[1])) {
        $router->add($single_route[0]);
    }else{
        $router->add($single_route[0], $single_route[1]);
    }
    
}

 $url = $_SERVER['QUERY_STRING'];

$router->dispatch($url);
