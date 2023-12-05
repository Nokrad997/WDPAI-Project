<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/ProfilePicture.php';
require_once __DIR__ . '/../repositories/UserRepository.php';
require_once __DIR__ . '/../repositories/ProfilePictureRepository.php';


class UserDataController extends AppController
{
    public function deleteUser()
    {
        $userRepository = new UserRepository();
        $profilePictureRepository = new ProfilePictureRepository();

        if ($_COOKIE["id"] != $_SESSION["id"]) {
            return $this->renderView("login", ['messages' => ['You are not logged in!']]);
        }

        $profilePictureRepository->deleteProfilePicture($_SESSION['id']);
        $userRepository->deleteUser($_SESSION['id']);
        session_destroy();
        setcookie("id", "", time() - 3600, "/");
        $this->renderView("login");
    }
}
