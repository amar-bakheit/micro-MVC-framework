<?php
/**
 * PHP verion 7.3.*
 * 
 * 
 * 
 */

namespace Core ;

 class Router {
     protected $routes;
    

     public function add($route, $params = []) {
         $route = preg_replace('/\//', '\\/', $route);
         $route = preg_replace('/\{([a-z]+)\}/', '(?<\1>[a-z]+)', $route);
         $route = preg_replace('/\{([a-z]+):([^\}]+)\}/', '(?P<\1>\2)' , $route);
         $route = '/^'.$route.'$/i';

        $this->routes[$route] = $params;
     }

     public function getRoutes() {
         return $this->routes;
     }

     public function match($url) {
        //match the URL format 

        foreach($this->routes as $route => $params) {
            if(preg_match($route, $url, $matches)) {
                foreach($matches as $key => $match) {
                    if(is_string($key)) {
                        $params[$key] = $match;
                    }
                }
                $this->params = $params;
                return true;
            }
        }
       
        return false;
     }

     /**
       * dispatch method : felllowing the route to classes and methods
       * matching the URL 
       * 
       */

     public function dispatch($url) {
         $url = $this->removeQueryStringVariable($url);
        if($this->match($url)) {
            $controller = $this->params['controller'];
            $controller = $this->convertToStudlyCaps($controller);
            $controller = $this->getNamespace() . $controller;

            if(class_exists($controller)) {
                $controller_object = new $controller($this->params);

                $action = $this->params['action'];
                $action = $this->covertToCamelCase($action);

                if(is_callable([$controller_object, $action])) {
                    $controller_object->$action();
                }else {
                    echo "method $action not found in controller $controller";
                }
            }else {
                echo "class $controller not found";
            }
        }else {
            echo "No route is match";
        }
     }
     /**
       * converting the controller name into a class name
       * 
       */
     protected function convertToStudlyCaps($string){
         return str_replace(' ', '', ucwords(str_replace('-', ' ', $string)));
     }

     /** 
       * coverting the action name into method name
       *  
       */

     protected function covertToCamelCase($string) {
         return lcfirst($this->convertToStudlyCaps($string));
     }

     /**
       *
       * 
       *  
      */
     protected function removeQueryStringVariable($url){
         if($url != '') {
             $parts = explode('&', $url, 2);

             if(strpos($parts[0], '=') === false) {
                 $url = $parts[0];
             }else {
                 $url ='';
             }
         }
         return $url;
     }

     //get the namespace from URL parameters
     protected function getNamespace(){
         $namespace = "App\Controllers\\" ;
         if(array_key_exists('namespace' , $this->params)) {
            $namespace .= $this->params['namespace'] . '\\';
         }
         

         return $namespace;
     }

     //get all URL parameters
     public function getParams(){
        return $this->params;
    }
 }