<?php

class User{
    public $id;
    public $nickname;
    public $password;
    public $email;

    public function __construct(int $id, string $nickname, string $password, string $email){
        $this->id = $id;
        $this->nickname = $nickname;
        $this->password = $password;
        $this->email = $email;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getNickname(): string{
        return $this->nickname;
    }

    public function getPassword(): string{
        return $this->password;
    }

    public function getEmail(): string{
        return $this->email;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setNickname(string $nickname): void{
        $this->nickname = $nickname;
    }

    public function setPassword(string $password): void{
        $this->password = $password;
    }

    public function setEmail(string $email): void{
        $this->email = $email;
    }
}