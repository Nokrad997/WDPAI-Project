<?php

require_once __DIR__.'/../models/User.php';
require_once 'Repository.php';

class UserRepository extends Repository {

    public function getUser(string $email): ?User
    {
        $statement = $this->database->connect()->prepare('
            SELECT * FROM public.Users WHERE email = :email'
        );

        $statement->bindParam(':email', $email, PDO::PARAM_STR);
        $statement->execute();

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if($user == false) {
            return null;
        }

        return new User(
            $user['nickname'],
            $user['email'],
            $user['password']
        );
    }
}