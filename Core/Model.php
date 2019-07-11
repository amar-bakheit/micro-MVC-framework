<?php

namespace Core;
use PDO;
 abstract class Model {
    protected static function connectDB() {
        static $database = NULL;
        if($database === NULL) {
            $host = "localhost";
            $username = "root";
            $password = "";
            $dataBaseName = "abstract_layer";
    
            $dsn = "mysql:host=$host;dbname=$dataBaseName;charset=utf8";
    
            try {
                $connection = new PDO($dsn, $username, $password);
                $connection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE , PDO::FETCH_OBJ); //OR FETCH_ASSOC
                return $connection;
                
                    
            } catch (PDOException $error) {
                echo $error->getMessage();
            }
        }

    }
}