<?php

use App\Routing\Router;
use App\Controllers\HomeController;
$router = new Router();

$router->route('/',[HomeController::class,'home']);
$router->route('/showOne',[HomeController::class,'showOne']);
$router->route('/add-form',[HomeController::class,'addPage']);
$router->route('/add',[HomeController::class,'add']);
$router->route('/delete',[HomeController::class,'delete']);
$router->route('/update',[HomeController::class,'update']);
try {
    $router->resolve();
} catch (Exception $e) {
}