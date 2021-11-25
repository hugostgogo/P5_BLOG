<?php

namespace App\Routing;

class Router
{

    private $url;
    private $routes = [];
    private $namedRoutes = [];

    public function __construct($url)
    {
        $this->url = $url;
    }

    public function get($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'GET');
    }

    public function post($path, $callable, $name = null)
    {
        return $this->add($path, $callable, $name, 'POST');
    }

    private function add($path, $callable, $name, $method)
    {
        $route = new Route($path, $callable);
        $this->routes[$method][] = $route;
        if (is_string($callable) && $name === null) {
            $name = $callable;
        }
        if ($name) {
            $this->namedRoutes[$name] = $route;
        }
        return $route;
    }

    public function run()
    {
        
        if (!isset($this->routes[$_SERVER['REQUEST_METHOD']])) {
            echo 'REQUEST_METHOD does not exist';
        }
        foreach ($this->routes[$_SERVER['REQUEST_METHOD']] as $route) {
            if ($route->match($this->url)) {
                return $route->call();
            }
        }
        require($_SERVER['DOCUMENT_ROOT'] . "/app/views/404.html.php");
    }

    public function url($name, $params = [])
    {
        if (!isset($this->namedRoutes[$name])) {
            echo 'No route matches this name';
        }
        return $this->namedRoutes[$name]->getUrl($params);
    }
}
