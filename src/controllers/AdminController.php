<?php

require_once 'AppController.php';
require_once __DIR__ . '/../repositories/UserRepository.php';
require_once __DIR__ . '/../repositories/ProfilePictureRepository.php';
require_once __DIR__ . '/../repositories/FriendsRepository.php';
require_once __DIR__ . '/../repositories/MessagesRepository.php';



class AdminController extends AppController
{
    public function admin() {
        if(isset($_COOKIE["id"]) && isset($_SESSION["id"]) && $_COOKIE["id"] == $_SESSION["id"]) {
            $this->renderView("admin");
        } else {
            $this->renderView("login");
        }
    }

    public function adminUpdateUserCredenials() {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $id = $_POST['id'];
            $email = $_POST['email'];
            $nickname = $_POST['nickname'];
            $password = 'null';

            $userRepository = new UserRepository();
            $userRepository->updateUser($id, $nickname, $email , $password);

            $response = [
                "status" => "success",
                "message" => "User credentials updated."
            ];

            header("Content-Type: application/json");
            echo json_encode($response);
            exit;
        }
    }

    public function adminDeleteUser() {

        $user_id = $_POST['id'];

        $UserRepo = new UserRepository();
        $ProfilePictureRepo = new ProfilePictureRepository();
        $FriendsRepo = new FriendsRepository();
        $MessagesRepo = new MessagesRepository();

        $ProfilePictureRepo->deleteProfilePicture($user_id);
        $FriendsRepo->deleteFriends($user_id);
        $MessagesRepo->deleteMessages($user_id);
        $UserRepo->deleteUser($user_id);

        $response = [
            "status" => "success",
            "message" => "User deleted."
        ];
    }
}