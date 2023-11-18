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

    public function updateUser(int $id, string $nickname, string $email, string $password): bool
    {
        if($password == "null")
            $password = null;
        if($email == "null")
            $email = null;
        if($nickname == "null")
            $nickname = null;

        $statement = $this->database->connect()->prepare('
            UPDATE "Users" SET
                nickname = COALESCE(?, nickname),
                email = COALESCE(?, email),
                password = COALESCE(?, password)
            WHERE id = ?
        ');

        return $statement->execute([
            $nickname,
            $email,
            $password,
            $id
        ]);
    }

    public function updateSessionData() {
        $statement = $this->database->connect()->prepare('
            SELECT * FROM "Users" WHERE id = ?
        ');

        $statement->execute([
            $_SESSION['id']
        ]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        $_SESSION['nickname'] = $user['nickname'];
        $_SESSION['email'] = $user['email'];
        $_SESSION['password'] = $user['password'];
    }
}
