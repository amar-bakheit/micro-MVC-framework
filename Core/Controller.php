<?php
/**
 * 
 * 
 * 
 * 
 * 
 */

 namespace Core;

 abstract class Controller {
     /**
       *
       *  
      */
    public function __construct($route_params) {
        $this->route_params = $route_params;
    }
      

}