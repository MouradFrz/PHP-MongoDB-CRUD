<?php
namespace App\Database;

use Exception;
use MongoDB\Client;

class NoSql{
    private $cluster;

    function __construct()
    {
        $this->cluster = new Client($_ENV["MONGO_CONNECTION_STRING"]);
    }
    public function usersCollection(){
        return $this->cluster->batata->users;
    }
}