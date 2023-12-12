<?php

require_once 'Repository.php';

class MessagesRepository extends Repository {

    public function saveMessage($sender_id, $recipent_id, $content) {
        $statement = $this->database->connect()->prepare(
            'INSERT INTO "Messages" (sender_id, recipent_id, content) VALUES (?, ?, ?) RETURNING *'
        );

        $statement->execute([
            $sender_id,
            $recipent_id,
            $content
        ]);

        $message = $statement->fetch(PDO::FETCH_ASSOC);

        if ($message == false) {
            return null;
        }

        return true;
    }

    public function getMessages($sender_id, $recipent_id) {
        $statement = $this->database->connect()->prepare(
            'SELECT * FROM "Messages" WHERE (sender_id = ? AND recipent_id = ?) OR (sender_id = ? AND recipent_id = ?) ORDER BY sent_at ASC'
        );

        $statement->execute([
            $sender_id,
            $recipent_id,
            $recipent_id,
            $sender_id
        ]);

        $messages = $statement->fetchAll(PDO::FETCH_ASSOC);

        if ($messages == false) {
            return null;
        }

        return $messages;
    }

    public function deleteMessages($user_id) {
        $statement = $this->database->connect()->prepare(
            'DELETE FROM "Messages" WHERE sender_id = ? OR recipent_id = ?'
        );

        $statement->execute([
            $user_id,
            $user_id
        ]);
    }
}