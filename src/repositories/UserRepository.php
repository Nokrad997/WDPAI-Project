<?php

require_once __DIR__.'/../models/User.php';
require_once 'Repository.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User
    {
        $statement = $this->database->connect()->prepare('
            SELECT * FROM "Users" WHERE email = ?'
        );

        $statement->execute([$email]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['nickname'],
            $user['password'],
            $user['email']
        );
    }
}