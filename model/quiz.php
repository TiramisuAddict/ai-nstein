<?php
class Quiz {
    private ?int $id = null;
    private ?string $title= null;
    private ?int $time= null;
    private ?string $difficulty = null;

    public function __construct($title, $time,$difficulty)
    {
        $this->title = $title;
        $this->time= $time;
        $this->difficulty = $difficulty;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getTitle(): string
    {
        return $this->title;
    }
    public function getTime(): int
    {
        return $this->time;
    }
    public function getDifficulty():string
    {
        return $this->difficulty;
    }
    // Setters
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setTitle($title): self
    {
        $this->title = $title;
        return $this;
    }
    public function setTime($time): self
    {
        $this->time = $time;
        return $this;
    }
    public function setDifficulty($difficulty): self
    {
        $this->difficulty= $difficulty;
        return $this;
    }
}
?>