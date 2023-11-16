<?php

require_once __DIR__ . '/../../src/repositories/UserRepository.php';
require_once __DIR__.'/../../src/repositories/ProfilePictureRepository.php';

header('Content-Type: application/json');
$response = ['status' => 'success', 'message' => 'Changes saved successfully.'];
var_dump($_POST);
var_dump($_FILES);
// echo json_encode($response);
// json_encode($response);
var_dump($response);
die();
