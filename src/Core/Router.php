<?php

namespace Hb\SkyblogSlayevalphp\Core;

class Router{
    private array $routes;

    public function __construct($routes) {
        $this->routes = $routes;
    }

    public function init(){
        $currentPath = $_SERVER['PATH_INFO'] ?? "";
        foreach ($this->routes as $path => $controller) {
            if (trim($currentPath, "/") == trim($path, "/")) {
                $controller->processRequest();
                return;
            }

        }
    }
}