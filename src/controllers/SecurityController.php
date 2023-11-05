<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repositories/UserRepository.php';

class SecurityController extends AppController {

    public function login() {

        $userRepository = new UserRepository();
        if(!$this->isPost()) {
            return $this->renderView("login");
        }
        
        $email = $_POST["login"];
        $password = $_POST["password"];
        $user = $userRepository->getUser($email); 

        if(!$user) {
            return $this->renderView("login", ['messages' => ['User with this email doesn\'t exist!']]);
        }

        if($user->getEmail() !== $email) {
            return $this->renderView("login", ['messages' => ['User with this email doesn\'t exist!']]);
            
        } 

        if($user->getPassword() !== $password) {
            return $this->renderView("login", ['messages' => ['Wrong password!']]);
        }

        $url = "http://$_SERVER[HTTP_HOST]";
        header("Location: {$url}/menu");
    }

    public function register() {
        $nickname = $_POST["nickname"];
        $email = $_POST["email"];
        $password = $_POST["password"];
        $password2 = $_POST["reEnter"];

        var_dump($nickname);
        var_dump($email);
        var_dump($password);
        var_dump($password2);
        die();
    }
}