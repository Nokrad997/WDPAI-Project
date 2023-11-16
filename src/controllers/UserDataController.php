<?php

require_once 'AppController.php';
require_once __DIR__ . '/../models/User.php';
require_once __DIR__ . '/../models/ProfilePicture.php';
require_once __DIR__ . '/../repositories/UserRepository.php';
require_once __DIR__ . '/../repositories/ProfilePictureRepository.php';


class UserDataController extends AppController
{
    public function saveChanges()
    {
        var_dump("l");
        die();
        // // Odpowiedź domyślnie ustawiona na błąd
        // $response = ['status' => 'error', 'message' => 'Something went wrong.'];

        // // Sprawdź czy przyszedł poprawny POST
        // if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        //     // Sprawdź czy przyszedł poprawny JSON
        //     // $postData = file_get_contents("php://input");
        //     // $data = json_decode($postData, true);

        //     // Pobierz dane z przysłanego POST-a
        //     $nickname = $_POST['nickname'];
        //     $email = $_POST['email'];
        //     $password = $_POST['password'];

        //     // Tutaj wykonaj operacje zapisywania danych do bazy danych lub innego miejsca
        //     // ...

        //     // Przykładowa odpowiedź JSON w przypadku sukcesu
        //     $response = ['status' => 'success', 'message' => 'Changes saved successfully.'];
        // } else {
        //     // Błąd metody żądania
        //     $response = ['status' => 'error', 'message' => 'Invalid request method.'];
        // }

        // // Wysyłanie odpowiedzi JSON z powrotem do klienta
        // header('Content-Type: application/json');
        // echo json_encode($response);
    }
}
