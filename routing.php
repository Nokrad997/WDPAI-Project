<?php

require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/UserDataController.php'; 

class Routing {
    public static $routes;

    public static function get($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function post ($url, $controller) {
        self::$routes[$url] = $controller;
    }

    public static function run($url) {
        $action = explode('/', $url)[0];

        if($action === '') {
            $action = 'home';
        }
    
        if(!array_key_exists($action, self::$routes)) {
            die("not found");
        } 

        $controller = self::$routes[$action]; 
        $object = new $controller;

        $object->$action();
    }

}