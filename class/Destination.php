<?php

class Destination
{

    private int $id;

    private  string $location;

    private int $price;

    private int $tourOperatorId;

    private string $bgImage;


    public function __construct($data)
    {
        $this-> id = $data['id'];
        $this -> location = $data['location'];
        $this -> price = $data['price'];
        $this -> tourOperatorId =$data['tourOperatorId'];
        $this -> bgImage = $data['bgImage'];
    }
    //  GETTERS ////////////
    public function getId(): int
    {
        return $this->id;
    }

    public function getLocation(): string
    {
        return $this->location;
    }

    public function getPrice(): int
    {
        return $this->price;
    }

    public function getTourOperatorId(): int
    {
        return $this->tourOperatorId;
    }

    public function getBgImage(): string
    {
        return $this->bgImage;
    }

    //  SETTERS ////////////
    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setLocation($location): void
    {
        $this->location = $location;
    }

    public function setPrice($price): void
    {
        $this->price = $price;
    }

    public function setTourOperatorId($tourOperatorId): void
    {
        $this->tourOperatorId = $tourOperatorId;
    }

    public function setBgImage($bgImage): void
    {
        $this->bgImage = $bgImage;
    }

    //  METHODS ////////////

}
