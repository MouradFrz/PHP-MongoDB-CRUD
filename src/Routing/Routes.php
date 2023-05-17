<?php

use App\Routing\Router;
use App\Controllers\HomeController;
$router = new Router();

$router->get('/',[HomeController::class,'home']);
$router->get('/showOne',[HomeController::class,'showOne']);
$router->get('/test',[HomeController::class,'test']);
$router->get('/add-form',[HomeController::class,'addPage']);
$router->post('/add',[HomeController::class,'add']);
$router->post('/delete',[HomeController::class,'delete']);
$router->post('/update',[HomeController::class,'update']);

try {
    $router->route();
} catch (Exception $e) {
}