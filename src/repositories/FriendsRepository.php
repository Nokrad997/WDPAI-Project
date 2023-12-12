<?php

require_once __DIR__ . "/../models/Friends.php";
require_once 'Repository.php';

class FriendsRepository extends Repository
{

    public function getFriends($id)
    {
        $statement = $this->database->connect()->prepare(
            'SELECT * FROM "Friends" WHERE user_id = ? OR friend_user_id = ?'
        );

        $statement->execute([
            $id,
            $id
        ]);

        $friends = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($friends == false) {
            return null;
        }

        return $friends;
    }

    public function addFriend($id, $friend_id)
    {
        if ($id == $friend_id) {
            return null;
        }

        if ($this->checkIfFriends($id, $friend_id)) {
            return null;
        }

        $statement = $this->database->connect()->prepare(
            'INSERT INTO "Friends" (user_id, friend_user_id, status) VALUES (?, ?, ?) RETURNING *'
        );

        $statement->execute([
            $id,
            $friend_id,
            "pending"
        ]);

        $friend = $statement->fetch(PDO::FETCH_ASSOC);

        if ($friend == false) {
            return null;
        }

        return true;
    }

    public function deleteFriend($id, $friend_id)
    {
        if ($this->checkIfFriends($id, $friend_id) == null) {
            if($this->checkIfFriends($friend_id, $id) == null)
                return null;
            else {
                $tmp = $id;
                $id = $friend_id;
                $friend_id = $tmp;
            }
        }

        $statement = $this->database->connect()->prepare(
            'DELETE FROM "Friends" WHERE user_id = ? AND friend_user_id = ? RETURNING *'
        );

        $statement->execute([
            $id,
            $friend_id
        ]);

        $friend = $statement->fetch(PDO::FETCH_ASSOC);

        if ($friend == false) {
            return null;
        }

        return true;
    }

    public function acceptFriend($id, $friend_id)
    {
        if ($this->checkIfFriends($id, $friend_id) == null) {
            if($this->checkIfFriends($friend_id, $id) == null)
                return null;
            else {
                $tmp = $id;
                $id = $friend_id;
                $friend_id = $tmp;
            }
        }

        $statement = $this->database->connect()->prepare(
            'UPDATE "Friends" SET status = ? WHERE user_id = ? AND friend_user_id = ? RETURNING *'
        );

        $statement->execute([
            "accepted",
            $id,
            $friend_id
        ]);

        $friend = $statement->fetch(PDO::FETCH_ASSOC);

        if ($friend == false) {
            return null;
        }

        return true;
    }

    public function declineFriend($id, $friend_id)
    {
        if ($this->checkIfFriends($id, $friend_id) == null) {
            if($this->checkIfFriends($friend_id, $id) == null)
                return null;
            else {
                $tmp = $id;
                $id = $friend_id;
                $friend_id = $tmp;
            }
        }

        $statement = $this->database->connect()->prepare(
            'DELETE FROM "Friends" WHERE user_id = ? AND friend_user_id = ? RETURNING *'
        );

        $statement->execute([
            $id,
            $friend_id
        ]);

        $friend = $statement->fetch(PDO::FETCH_ASSOC);

        if ($friend == false) {
            return null;
        }

        return true;
    }

    public function checkIfFriends($id, $friend_id)
    {
        $statement = $this->database->connect()->prepare(
            'SELECT * FROM "Friends" WHERE user_id = ? AND friend_user_id = ?'
        );

        $statement->execute([
            $id,
            $friend_id
        ]);

        $friend = $statement->fetch(PDO::FETCH_ASSOC);

        if ($friend == false) {
            return null;
        }

        return true;
    }

    public function deleteFriends($user_id) {
        $statement = $this->database->connect()->prepare(
            'DELETE FROM "Friends" WHERE user_id = ? OR friend_user_id = ?'
        );

        $statement->execute([
            $user_id,
            $user_id
        ]);
    }
}
