<?php

namespace App\Routing;

class Router
{
    private $routes = [];

    public function route()
    {
        $path = explode("?", $_SERVER["REQUEST_URI"])[0];
        $available_uris = array_column($this->routes, "uri");
        if (!in_array($path, $available_uris)) {
            http_response_code(404);
            die;
        }
        foreach ($this->routes as $route) {
            if ($route["uri"] === $path && $route["method"] === $_SERVER["REQUEST_METHOD"]) {
                $action = $route["action"];
                return $action();
            }
        }
        http_response_code(405);
        die;
    }
    public function get(String $path, callable $action)
    {
        $this->routes[] = [
            "uri" => $path,
            "action" => $action,
            "method" => "GET"
        ];
    }
    public function post(String $path, callable $action)
    {
        $this->routes[] = [
            "uri" => $path,
            "action" => $action,
            "method" => "POST"
        ];
    }
    public function delete(String $path, callable $action)
    {
        $this->routes[] = [
            "uri" => $path,
            "action" => $action,
            "method" => "DELETE"
        ];
    }
    public function update(String $path, callable $action)
    {
        $this->routes[] = [
            "uri" => $path,
            "action" => $action,
            "method" => "UPDATE"
        ];
    }
    public function resolve()
    {

        $action = $this->routes[$path] ?? null;
        if (!is_callable($action)) {
            http_response_code(404);
            die;
        }
        return $action();
    }
}
