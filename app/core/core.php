<?php
class Router
{
    private $path;
    private $method;
    private $routes;


    public function __construct($routes)
    {
        $this->routes = $routes;
        $this->path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $this->method =  $_SERVER["REQUEST_METHOD"];
    }

    public function handlerFunction()
    {
        $handler = $this->routes[$this->method][$this->path];

        if (is_callable($handler)) {
            return $handler();
        }

        return $handler;
    }
}
