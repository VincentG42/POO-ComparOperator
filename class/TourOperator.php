<?php


class TourOperator
{
    private int $id;

    private string $name;

    private string $link;

    private int $gradeCount;

    private int $gradeTotal;

    private bool $isPremium;

    public function __construct($data)
    {
        $this->id = $data['id'];
        $this -> name = $data['name'];
        $this -> link = $data['link'];
        $this -> gradeCount = $data['gradeCount'];
        $this -> gradeTotal = $data['gradeTotal'];
        $this -> isPremium = $data['isPremium'];
    }

    /* SETTERS     */

    public function setId($id): void
    {
        $this->id = $id;
    }

    public function setName($name): void
    {
        $this->name = $name;
    }

    public function setLink($link): void
    {
        $this->link = $link;
    }

    public function setGradeCount($gradeCount): void
    {
        $this->gradeCount = $gradeCount;
    }

    public function setGradeTotal($gradeTotal): void
    {
        $this->gradeTotal = $gradeTotal;
    }

    public function setIsPremium($isPremium): void
    {
        $this->isPremium = $isPremium;
    }

    /* GETTERS     */

    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getLink(): string
    {
        return $this->link;
    }

    public function getGradeCount(): int
    {
        return $this->gradeCount;
    }

    public function getGradeTotal(): int
    {
        return $this->gradeTotal;
    }

    public function getIsPremium(): bool
    {
        return $this->isPremium;
    }

    /* METHODS     */
}
