<?php

require_once __DIR__ . '/../models/User.php';
require_once 'Repository.php';

class UserRepository extends Repository
{

    public function getUsers(): ?array
    {
        $statement = $this->database->connect()->prepare(
            'SELECT * FROM "Users" WHERE id != ? ORDER BY id ASC'
        );

        $statement->execute([$_SESSION['id']]);
        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($users == false) {
            return null;
        }

        return $users;
    }

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
            $user['email'],
            $user['isAdmin']
        );
    }

    public function getUserById($id): ?User
    {
        $statement = $this->database->connect()->prepare(
            'SELECT * FROM "Users" WHERE id = ?'
        );

        $statement->execute([$id]);

        $user = $statement->fetch(PDO::FETCH_ASSOC);

        if ($user == false) {
            return null;
        }

        return new User(
            $user['id'],
            $user['nickname'],
            $user['password'],
            $user['email'],
            $user['isAdmin']
        );
    }

    public function getUserByName($nickname): ?array
    {
        $statement = $this->database->connect()->prepare(
            'SELECT * FROM "Users" WHERE nickname LIKE ? AND id != ?'
        );

        $statement->execute([$nickname, $_SESSION['id']]);

        $users = $statement->fetchAll(PDO::FETCH_ASSOC);

        if (empty($users)) {
            return null;
        }

        return $users;
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

    public function updateUser(int $id, string $nickname = 'null', string $email = 'null', string $password = 'null'): bool
    {
        if ($password == "null")
            $password = null;
        if ($email == "null")
            $email = null;
        if ($nickname == "null")
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

    public function updateSessionData()
    {
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

    public function deleteUser(int $id): void
    {
        $statement = $this->database->connect()->prepare('
            DELETE FROM "Users" WHERE id = :id;
        ');

        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();
    }
}
