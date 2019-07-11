<?php
/**  
 * 
 * 
 */

namespace Core;

class View {
    /**
     * 
     * 
     */

     public static function render($view, $args = []) {
        $file = "../App/Resources/Views/$view";
        if(is_readable($file)) {
            require $file;
        }else {
            echo $file . " not found 404";
        }

     }
}