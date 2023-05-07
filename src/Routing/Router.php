<?php

namespace App\Routing;

class Router
{
    private $routes = [];

    public function route(String $path,callable $action){
        $this->routes[$path]=$action;
    }
    public function resolve(){
        $path = explode("?",$_SERVER["REQUEST_URI"])[0];
        $action = $this->routes[$path] ?? null;
        if(!is_callable($action)){
            http_response_code(404);
            die;
        }
        return $action();
    }
}