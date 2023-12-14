<?php

require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../repositories/UserRepository.php';
require_once __DIR__.'/../repositories/ProfilePictureRepository.php';

session_start();


class SecurityController extends AppController {

    public function login() {
        
        $userRepository = new UserRepository();
        $email = $_POST["login"];
        $password = $_POST["password"];
        $user = $userRepository->getUser($email); 

        if(!$user) {
            return $this->renderView("login", ['messages' => ['User with this email doesn\'t exist!']]);
        }

        if($user->getEmail() !== $email) {
            return $this->renderView("login", ['messages' => ['User with this email doesn\'t exist!']]);
            
        } 

        if(!password_verify($password, $user->getPassword())) {
            return $this->renderView("login", ['messages' => ['Wrong password!']]);
        }

        $profilePictureRepository = new ProfilePictureRepository();
        $profilePicture = $profilePictureRepository->getProfilePicture($user->getId());

        $_SESSION["id"] = $user->getId();
        $_SESSION["nickname"] = $user->getNickname();
        $_SESSION["email"] = $user->getEmail();
        $_SESSION["password"] = $user->getPassword();

        setcookie("id", $user->getId(), time() + 3600, "/");

        if($profilePicture != null && $profilePicture->getPath() != null)
            $_SESSION["profilePicture"] = $profilePicture->getPath();
        

        if($user->getIsAdmin()) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/admin");
        } else {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/menu");
        }

    }

    public function register() {
        $userRepo = new UserRepository();

        if($userRepo->getUser($_POST['email']) != null) {
            return $this->renderView("register", ['messages' => ['User with this email already exists!']]);
        }

        $hashedPassword = password_hash($_POST['password'], PASSWORD_DEFAULT);

        if($userRepo->addUser($_POST['nickname'], $hashedPassword, $_POST['email'])) {
            $url = "http://$_SERVER[HTTP_HOST]";
            header("Location: {$url}/home");
        } else {
            return $this->renderView("register", ['messages' => ['Something went wrong!']]);
        }
    }
}