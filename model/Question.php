<?php
class Question {
    private ?int $id = null;
    private ?string $text= null;
    private ?int $quiz_id = null;
    private ?int $reponse_id = null;


    public function __construct($text, $quiz_id, $reponse_id)
    {
        $this->text = $text;
        $this->quiz_id = $quiz_id;
        $this->reponse_id = $reponse_id ; 
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

    public function getQuizId(): int
    {
        return $this->quiz_id;
    }
    public function getReponseId(): int
    {
        return $this->reponse_id;
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

    public function setQuizID($quiz_id): self
    {
        $this->quiz_id= $quiz_id;
        return $this;
    }
    public function setReponseID($reponse_id): self
    {
        $this->reponse_id_id= $reponse_id;
        return $this;
    }
}
?>
