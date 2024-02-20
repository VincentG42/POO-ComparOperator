<?php

class Review
{

    private int $id;

    private string $message;

    private string $author;

    private int $tourOperatorId;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this -> message = $data['message'];
        $this -> author = $data['author'];
        $this -> tourOperatorId = $data['tourOperatorId'];
    }

    // GETTERS /////////////////
    public function getId(): int
    {
        return $this->id;
    }

    public function getMessage(): string
    {
        return $this->message;
    }

    public function getAuthor(): string
    {
        return $this->author;
    }

    public function getTourOperatorId(): int
    {
        return $this->tourOperatorId;
    }

    // SETTERS /////////////

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setMessage($message): void
    {
        $this->message = $message;
    }

    public function setAuthor($author): void
    {
        $this->author = $author;
    }

    public function setTourOperatorId($tourOperatorId): void
    {
        $this->tourOperatorId = $tourOperatorId;
    }
    // METHODS ///////




}

?>