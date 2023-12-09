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

    public function updateUser()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $postData = file_get_contents("php://input");
            $data = json_decode($postData, true);

            $this->updateUserCredentials();

            if(!empty($_FILES['profilePicture']['name']))
                $this->updateProfilePicture();

            $response = ['status' => 'success', 'message' => 'Changes saved successfully.'];
        } else {
            $response = ['status' => 'error', 'message' => 'Invalid request method.'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function updateProfilePicture()
    {
        $profilePictureRepository = new ProfilePictureRepository();
        $path = __DIR__ . '/../../data/users_profile_pictures/' . $_SESSION['id'] . ".png";
        fopen($path, "w");
        $path = str_replace("/app", "", $path);

        if (!$profilePictureRepository->getProfilePicture($_SESSION['id'])) {
            $profilePictureRepository->addProfilePicture($_SESSION['id'], $path);
        } else {
            $profilePictureRepository->updateProfilePicture($_SESSION['id'], $path);
            echo "cipa";
        }

        if (!empty($_FILES['profilePicture']['name'])) {
            move_uploaded_file(
                $_FILES['profilePicture']['tmp_name'],
                __DIR__ . '/../../data/users_profile_pictures/' . $_SESSION['id'] . ".png"
            );
        }

        $_SESSION['profilePicture'] = $path;
    }

    public function updateUserCredentials()
    {
        $nickname = $_POST['nickname'];
        $email = $_POST['email'];
        $password = $_POST['password'];
        $userRepo = new UserRepository();

        $userRepo->updateUser($_SESSION['id'], $nickname, $email, $password);
        $userRepo->updateSessionData();
    }
}
