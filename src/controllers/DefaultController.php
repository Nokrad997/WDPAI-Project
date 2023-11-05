<?php

require_once 'AppController.php'; 

class DefaultController extends AppController {

    public function home() {
        $this->renderView("login");
    }

    public function login() {
        $this->renderView("login");
    }

    public function registerForm() {
        $this->renderView("register");
    }

    public function register() {
        $this->renderView("register");
    }

    public function menu() {
        $this->renderView("menu");
    }
}