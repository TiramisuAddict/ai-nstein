<?php
class Reponse {
    private ?int $id = null;
    private ?string $text= null;

    public function __construct($text)
    {
        $this->text = $text;
    }

    // Getters
    public function getId(): int
    {
        return $this->id;
    }

    public function getText(): string
    {
        return $this->text;
    }
    // Setters
    public function setId($id): self
    {
        $this->id = $id;
        return $this;
    }

    public function setText($text): self
    {
        $this->text = $text;
        return $this;
    }
}
?>