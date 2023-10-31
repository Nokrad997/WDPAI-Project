<?php
error_reporting(E_ERROR | E_PARSE);


require 'src/controllers/DefaultController.php';
require 'routing.php';

$path = trim($_SERVER['REQUEST_URI'], '/'); 
$path = parse_url($path, PHP_URL_PATH);

// Routing::get("", DefaultController);
Routing::get('login', DefaultController);
Routing::get('register', DefaultController);
Routing::run($path);