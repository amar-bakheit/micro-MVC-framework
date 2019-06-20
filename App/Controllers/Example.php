<?php

namespace App\Controllers;
use \Core\Controller as BaseController;

class Example  extends BaseController {

    /**  
     * 
     * 
     */

    public function index() {
        echo "this is index page";
        echo '<hr>';
        echo '<pre>';
        echo htmlspecialchars(print_r($this->route_params, true));
        echo '</pre>';
    }

    
    /**  
     * 
     * 
     */

    public function create() {
        
    }

    
    /**  
     * 
     * 
     */

    public function edit() {
        
    }

    
    /**  
     * 
     * 
     */

    public function store() {
        
    }

    
    /**  
     * 
     * 
     */

    public function delete() {
        
    }
}

