<?php
require_once 'AppController.php';

class ChatController extends AppController
{

    private $messages = [];

    public function openChatWith()
    {
        if (isset($_COOKIE["id"]) && isset($_SESSION["id"]) && $_COOKIE["id"] == $_SESSION["id"]) {
            $_SESSION["chatWith"] = $_POST["friendId"];

            $response = ['status' => 'success', 'url' => 'chat'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
    }

    public function chat()
    {
        if(isset($_COOKIE["id"]) && isset($_SESSION["id"]) && $_COOKIE["id"] == $_SESSION["id"]) {
            $this->renderView("chat");
        } else {
            $this->renderView("login");
        }
    }
}
