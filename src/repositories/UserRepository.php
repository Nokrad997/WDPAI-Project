<?php

require_once __DIR__ . '/../models/User.php';
require_once 'Repository.php';

class UserRepository extends Repository
{

    public function getUser(string $email): ?User
    {
        $statement = $this->database->connect()->prepare(
            '
            SELECT * FROM "Users" WHERE email = ?'
        );

        $statement->execute([$email]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['id'],
            $user['nickname'],
            $user['password'],
            $user['email']
        );
    }

    public function addUser(string $nickname, string $password, string $email): bool
    {
        $statement = $this->database->connect()->prepare('
            INSERT INTO "Users" (nickname, email, password)
            VALUES (?, ?, ?)
        ');

        return $statement->execute([
            $nickname,
            $email,
            $password
        ]);
    }
}
