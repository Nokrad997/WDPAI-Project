<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/Friends.php';
require_once __DIR__ . '/../repositories/FriendsRepository.php';


class FriendsController extends AppController
{
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
}
