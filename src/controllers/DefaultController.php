<?php

require_once 'AppController.php'; 

class DefaultController extends AppController {

    public function home() {
        if(isset($_COOKIE["id"]) && isset($_SESSION["id"]) && $_COOKIE["id"] == $_SESSION["id"]) {
            $this->renderView("menu");
        } else {
            $this->renderView("login");
        }
    }

    public function login() {
        if(isset($_COOKIE["id"]) && isset($_SESSION["id"]) && $_COOKIE["id"] == $_SESSION["id"]) {
            $this->renderView("menu");
        } else {
            $this->renderView("login");
        }
    }

    public function registerForm() {
        $this->renderView("register");
    }

    public function register() {
        $this->renderView("register");
    }

    public function menu() {
        if(isset($_COOKIE["id"]) && isset($_SESSION["id"]) && $_COOKIE["id"] == $_SESSION["id"]) {
            $this->renderView("menu");
        } else {
            $this->renderView("login");
        }
    }

    public function account() {
        if(isset($_COOKIE["id"]) && isset($_SESSION["id"]) && $_COOKIE["id"] == $_SESSION["id"]) {
            $this->renderView("account");
        } else {
            $this->renderView("login");
        }
    }

    public function logout() {
        session_destroy();
        setcookie("id", "", time() - 3600, "/");
        $this->renderView("login");
    }
}