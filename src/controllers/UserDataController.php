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

    public function getUserByName()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nickname = $_POST['nickname']; // Pobieramy nickname z danych POST
        
            $userRepo = new UserRepository();
        
            $users = $userRepo->getUserByName($nickname);
        
            if ($users !== null) {
                $response = [
                    "status" => "success",
                    "users" => $users
                ];
            } else {
                $response = [
                    "status" => "error",
                    "message" => "User not found."
                ];
            }
        
        
            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        }
    }
}
