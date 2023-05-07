<?php
namespace App\Database;

use PDO;
use PDOException;

class Connection{
    public static function getConnection(){
        try{
            return new PDO("mysql:host=".$_ENV['DB_HOST'].";dbname=".$_ENV['DB_NAME'],$_ENV['DB_USERNAME'],$_ENV["DB_PASSWORD"]);
        }catch(PDOException $e){
            echo $e->getMessage();
            die;
        }
    }
}