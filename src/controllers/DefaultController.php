<?php

require_once 'AppController.php'; 

class DefaultController extends AppController {

    public function login() {
        $this->renderView("login");
    }

    public function register() {
        $this->renderView("register");
    }
}