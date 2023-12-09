<?php

class Friends {
    private $id;
    private $user_id;
    private $friend_id;
    private $status;

    public function __construct(int $id, int $user_id, int $friend_id, string $status){
        $this->id = $id;
        $this->user_id = $user_id;
        $this->friend_id = $friend_id;
        $this->status = $status;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getUser_id(): int{
        return $this->user_id;
    }

    public function getFriend_id(): int{
        return $this->friend_id;
    }

    public function getStatus(): string{
        return $this->status;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setUser_id(int $user_id): void{
        $this->user_id = $user_id;
    }

    public function setFriend_id(int $friend_id): void{
        $this->friend_id = $friend_id;
    }

    public function setStatus(string $status): void{
        $this->status = $status;
    }
}