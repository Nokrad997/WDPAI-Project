<?php
require_once 'AppController.php';
require_once __DIR__ . '/../repositories/MessagesRepository.php';

class ChatController extends AppController
{

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

    public function saveMessage()
    {
        $msgRepo = new MessagesRepository();
        $sender_id = $_POST["id"];
        $recipent_id = $_POST["chatWith"];
        $content = $_POST["content"];

        if($msgRepo->saveMessage($sender_id, $recipent_id, $content)) {
            $response = ['status' => 'success'];
        } else {
            $response = ['status' => 'error'];
        }

        header('Content-Type: application/json');
        echo json_encode($response);
        exit;
    }
}
