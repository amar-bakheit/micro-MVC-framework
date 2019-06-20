<?php
/** 
 * Here you can define your routes
 */

$routes =  [
     ['', [ 'controller' => 'home','action' => 'index']],
     ['admin/{controller}/{action}', ['namespace' => 'Admin']],
     ['{id:\d+}/{controller}/{action}'],
     ['{controller}/{id:\d+}/{action}'],
     ['{controller}/{action}']
];
