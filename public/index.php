<?php
//Preparing Headers
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE");
// header('Content-Type: application/json; charset=UTF-8');
session_start();
//Autoloader
require '../vendor/autoload.php';

//Env variables setup
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__. '/../');
$dotenv->load();

//Loading the routes registered in Routes.php
require '../src/Routing/Routes.php';