<?php
/**
 * 
 */

 namespace App\Controllers;
 use App\Models\Post;
use \Core\View;

 class Home extends \Core\Controller {
     public function index() {
      $users = Post::getAll();

       View::render('Home/index.php', ['users' => $users]);
     }
 }
