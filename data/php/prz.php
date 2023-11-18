<?php
session_start();

require_once __DIR__ . '/../../src/repositories/UserRepository.php';
require_once __DIR__ . '/../../src/repositories/ProfilePictureRepository.php';

$response = ['status' => 'error', 'message' => 'Something went wrong.'];

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    fopen($path,"w");
    $postData = file_get_contents("php://input");
    $data = json_decode($postData, true);
    $path = __DIR__ . '/../users_profile_pictures/' . $_SESSION['id'] . ".png";
    $path = str_replace("/app", "", $path);

    $nickname = $_POST['nickname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $userRepo = new UserRepository();
    $profilePictureRepository = new ProfilePictureRepository();

    if (!$profilePictureRepository->getProfilePicture($_SESSION['id'])) {
        $profilePictureRepository->addProfilePicture($_SESSION['id'], $path);
    } else {
        $profilePictureRepository->updateProfilePicture($_SESSION['id'], $path);
        echo "cipa";
    }

    if (!empty($_FILES['profilePicture']['name'])) {
        move_uploaded_file(
            $_FILES['profilePicture']['tmp_name'],
            __DIR__ . '/../users_profile_pictures/' . $_SESSION['id'] . ".png"
        );
    }

    $userRepo->updateUser($_SESSION['id'], $nickname, $email, $password);
    $userRepo->updateSessionData();
    $_SESSION['profilePicture'] = $path;
    $response = ['status' => 'success', 'message' => 'Changes saved successfully.'];
} else {
    $response = ['status' => 'error', 'message' => 'Invalid request method.'];
}

header('Content-Type: application/json');
echo json_encode($response);
