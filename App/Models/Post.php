<?php

namespace App\Models;




class Post extends \Core\Model  {

    public static function getAll() {
      $db =  static::connectDB();
      $stmt = "SELECT * FROM users";
                $stmt = $db->prepare($stmt);
                $stmt->execute();
                while($row = $stmt->fetch()) {
                    return $row->user_name;
                }
    }
}