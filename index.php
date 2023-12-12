<?php
// error_reporting(E_ERROR | E_PARSE);

require 'routing.php';
require_once 'src/controllers/DefaultController.php';
require_once 'src/controllers/SecurityController.php';
require_once 'src/controllers/FriendsController.php';
require_once 'src/controllers/ChatController.php';
require_once 'src/controllers/AdminController.php';

$path = trim($_SERVER['REQUEST_URI'], '/'); 
$path = parse_url($path, PHP_URL_PATH);

Routing::post('register', 'SecurityController');
Routing::post('login', 'SecurityController');

Routing::get('registerForm', 'DefaultController');
Routing::get('home', 'DefaultController');
Routing::get('account', 'DefaultController');
Routing::get('menu', 'DefaultController');
Routing::get('logout', 'DefaultController');
Routing::get('manageFriends', 'DefaultController');

Routing::post('updateUser', 'UserDataController');
Routing::post('getUserByName', 'UserDataController');
Routing::get('deleteUser', 'UserDataController');

Routing::get('friends', 'FriendsController');
Routing::post('addFriend', 'FriendsController');
Routing::post('deleteFriend', 'FriendsController');
Routing::post('acceptFriend', 'FriendsController');
Routing::post('declineFriend', 'FriendsController');

Routing::get('openChatWith', 'ChatController');
Routing::get('chat', 'ChatController');
Routing::post('saveMessage', 'ChatController');

Routing::get('admin', 'AdminController');
Routing::post('adminUpdateUserCredenials', 'AdminController');
Routing::post('adminDeleteUser', 'AdminController');

Routing::run($path);