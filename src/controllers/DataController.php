<?php
var_dump("chuj");
require_once 'AppController.php';
require_once __DIR__.'/../models/User.php';
require_once __DIR__.'/../models/ProfilePicture.php';
require_once __DIR__.'/../repositories/UserRepository.php';
require_once __DIR__.'/../repositories/ProfilePictureRepository.php';

class DataController extends AppController {

    public function saveChanges() {
        $userRepository = new UserRepository();
        $profilePictureRepository = new ProfilePictureRepository();

        $postData = file_get_contents("php://input");
        $response = ['success' => true];
        echo json_encode($response);
    }
}