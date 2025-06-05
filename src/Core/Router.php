<?php

namespace Hb\SkyblogSlayevalphp\Core;

use Hb\SkyblogSlayevalphp\View\MessageView;

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
        $messageView = new MessageView("Waw ! such empty");
        $messageView->render();
    }
}