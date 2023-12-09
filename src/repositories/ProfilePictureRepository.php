<?php

require_once __DIR__ . "/../models/ProfilePicture.php";
require_once 'Repository.php';

class ProfilePictureRepository extends Repository
{

    public function getProfilePicture($id)
    {
        $statement = $this->database->connect()->prepare(
            'SELECT * FROM "usersProfilePictures" WHERE id = ?'
        );

        $statement->execute([$id]);
        $profilePicture = $statement->fetch(PDO::FETCH_ASSOC);

        if ($profilePicture == false) {
            return null;
        }

        return new ProfilePicture(
            $profilePicture['id'],
            $profilePicture['user_id'],
            $profilePicture['picture_path']
        );
    }

    public function addProfilePicture($id, $path) {
        $statement = $this->database->connect()->prepare(
            'INSERT INTO "usersProfilePictures" (user_id, picture_path) VALUES (?, ?) RETURNING *'
        );

        $statement->execute([
            $id,
            $path
        ]);

        $profilePicture = $statement->fetch(PDO::FETCH_ASSOC);

        if ($profilePicture == false) {
            return null;
        }

        return new ProfilePicture(
            $profilePicture['id'],
            $profilePicture['user_id'],
            $profilePicture['picture_path']
        );
    }

    public function updateProfilePicture($id, $path)
    {
        $statement = $this->database->connect()->prepare(
            'UPDATE "usersProfilePictures" SET picture_path = ? WHERE id = ? RETURNING *'
        );

        $statement->execute([
            $path,
            $id
        ]);

        $profilePicture = $statement->fetch(PDO::FETCH_ASSOC);

        if ($profilePicture == false) {
            return null;
        }


        return new ProfilePicture(
            $profilePicture['id'],
            $profilePicture['user_id'],
            $profilePicture['picture_path']
        );
    }

    public function deleteProfilePicture(int $id) : void {
        $statement = $this->database->connect()->prepare('
            DELETE FROM "usersProfilePictures" WHERE user_id = :id
        ');
        $statement->bindParam(':id', $id, PDO::PARAM_INT);
        $statement->execute();

        $path = __DIR__ . '/../../data/users_profile_pictures/' . $_SESSION['id'] . ".png";
        if(file_exists($path))
            unlink($path);
    }
}
