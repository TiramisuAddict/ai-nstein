<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../Model/Question.php';
class QuestionController
{
    public function ListQuestion()
    {
        try {
            $pdo = connexion::getConnexion();
            $query = $pdo->prepare("SELECT * FROM question");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        }
    }
    public function ListQuestionById($id)
    {
        try {
            $pdo = connexion::getConnexion();
            $query = $pdo->prepare("SELECT * FROM question WHERE id = :id");
            $query->execute(['id' => $id]);
            return $query->fetch();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        }
    }
    function AddQuestion($question)
    {
        try {
            $pdo = connexion::getConnexion();
            $query = $pdo->prepare("INSERT INTO question (text,quiz_id,reponse_id) VALUES (:text, :quiz_id , :reponse_id)");
            if($question->getQuizId() == -1){
                $QuizId = NULL ; 
            }
            else{
                $QuizId = $question->getQuizId(); 
            }
            $query->execute([
                'text' => $question->getText(),
                'quiz_id' => $QuizId,
                'reponse_id' => $question->getReponseId()
            ]);
            echo $query->rowCount() . " record(s) ADDED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function DeleteQuestion($id)
    {
        try {
            $pdo = connexion::getConnexion();
            $query = $pdo->prepare("DELETE FROM question WHERE id = :id");
            $query->execute([
                'id' => $id
            ]);
            echo $query->rowCount() . " record(s) DELETED successfully <br>";
        } catch (PDOException $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function UpdateQuestion($question, $id)
    {
        try {
            if($question->getQuizId() == -1){
                $QuizId = $this->ListQuestionById($id); 
            }
            else{
                $QuizId = $question->getQuizId(); 
            }
            $pdo = connexion::getConnexion();
            $query = $pdo->prepare('UPDATE question SET text= :text, reponse_id = :reponse_id WHERE id = :id');
            $query->execute([
                'text' => $question->getText(),
                'reponse_id' => $question->getReponseId(),
                'id' => $id
            ]);
            echo $query->rowCount() . " record(s) UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
