<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Friends.php';
require_once __DIR__ . '/../repositories/FriendsRepository.php';


class FriendsController extends AppController
{

    public function friends() {
        if(isset($_COOKIE["id"]) && isset($_SESSION["id"]) && $_COOKIE["id"] == $_SESSION["id"]) {
            $this->renderView("friends");
        } else {
            $this->renderView("login");
        }
    }
    
    public function addFriend()
    {
        $userId = $_POST['userId'];
        $friendId = $_POST['friendId'];

        $friendsRepository = new FriendsRepository();

        if($friendsRepository->addFriend($userId, $friendId)) {
            $response = [
                'status' => 'success'
            ];
        } else {
            $response = [
                'status' => 'error'
            ];
        }

        header('Content-type: application/json');
        echo json_encode($response);
        exit;
    }

    public function deleteFriend() {
        $userId = $_POST['userId'];
        $friendId = $_POST['friendId'];

        $friendsRepository = new FriendsRepository();

        if($friendsRepository->deleteFriend($userId, $friendId)) {
            
            $response = [
                'status' => 'success'
            ];
        } else {
            $response = [
                'status' => 'error'
            ];
        }

        header('Content-type: application/json');
        echo json_encode($response);
        exit;
    }

    public function acceptFriend() {
        $userId = $_POST['userId'];
        $friendId = $_POST['friendId'];

        $friendsRepository = new FriendsRepository();

        if($friendsRepository->acceptFriend($userId, $friendId)) {
            
            $response = [
                'status' => 'success'
            ];
        } else {
            $response = [
                'status' => 'error'
            ];
        }

        header('Content-type: application/json');
        echo json_encode($response);
        exit;
    }

    public function declineFriend() {
        $userId = $_POST['userId'];
        $friendId = $_POST['friendId'];

        $friendsRepository = new FriendsRepository();

        if($friendsRepository->declineFriend($userId, $friendId)) {
            
            $response = [
                'status' => 'success'
            ];
        } else {
            $response = [
                'status' => 'error'
            ];
        }

        header('Content-type: application/json');
        echo json_encode($response);
        exit;
    }
}
