<?php

class ProfilePicture {
    private $id;
    private $user_id;
    private $picture_path;

    public function __construct(int $id, int $user_id, string $path){
        $this->id = $id;
        $this->user_id = $user_id;
        $this->picture_path = $path;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getPath(): string{
        return $this->picture_path;
    }

    public function getUser_id(): int{
        return $this->user_id;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setPath(string $path): void{
        $this->picture_path = $path;
    }

    public function setUser_id(int $user_id): void{
        $this->user_id = $user_id;
    }
}