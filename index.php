<?php
error_reporting(E_ERROR | E_PARSE);

require 'routing.php';
require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';

$path = trim($_SERVER['REQUEST_URI'], '/'); 
$path = parse_url($path, PHP_URL_PATH);

Routing::get('home', DefaultController);
Routing::post('login', SecurityController);
Routing::get('register', DefaultController);
Routing::get('menu', DefaultController);
Routing::run($path);