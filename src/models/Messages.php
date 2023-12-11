<?php

class Messages {
    private $id;
    private $sender_id;
    private $recipent_id;
    private $content;
    private $sent_at;

    public function __construct(int $id, int $sender_id, int $recipent_id, string $content, string $sent_at){
        $this->id = $id;
        $this->sender_id = $sender_id;
        $this->recipent_id = $recipent_id;
        $this->content = $content;
        $this->sent_at = $sent_at;
    }

    public function getId(): int{
        return $this->id;
    }

    public function getSender_id(): int{
        return $this->sender_id;
    }

    public function getRecipent_id(): int{
        return $this->recipent_id;
    }

    public function getContent(): string{
        return $this->content;
    }

    public function getSent_at(): string{
        return $this->sent_at;
    }

    public function setId(int $id): void{
        $this->id = $id;
    }

    public function setSender_id(int $sender_id): void{
        $this->sender_id = $sender_id;
    }

    public function setRecipent_id(int $recipent_id): void{
        $this->recipent_id = $recipent_id;
    }

    public function setContent(string $content): void{
        $this->content = $content;
    }

    public function setSent_at(string $sent_at): void{
        $this->sent_at = $sent_at;
    }
}