<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../Model/Quiz.php';
class QuizController
{
    private PDO $pdo;
    public function __construct()
    {
        $this->pdo = connexion::getConnexion();
    }
    public function ListQuiz()
    {
        try {
            $query = $this->pdo->prepare("SELECT * FROM quiz");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        }
    }
    public function ListQuizById($id)
    {
        try {
            $pdo = connexion::getConnexion();
            $query = $this->pdo->prepare("SELECT * FROM quiz WHERE id = :id");
            $query->execute(['id' => $id]);
            return $query->fetch();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        }
    }
    public function ListQuizByDefficulty($difficulty)
    {
        try {
            $pdo = connexion::getConnexion();
            $query = $pdo->prepare("SELECT * FROM quiz WHERE difficulty = :difficulty");
            $query->execute(['difficulty' => $difficulty]);
            return $query->fetchAll();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        }
    }
    function AddQuiz($quiz, $questions)
    {
        try {
            $pdo = $this->pdo;
            $query = $pdo->prepare("INSERT INTO quiz (title, time, difficulty) VALUES (:title, :time, :difficulty)");
            $query->execute([
                'title' => $quiz->getTitle(),
                'time' => $quiz->getTime(),
                'difficulty' => $quiz->getDifficulty()
            ]);
            $quizId = $pdo->lastInsertId();
            if (!empty($questions)) {
                $query = $pdo->prepare("UPDATE question SET quiz_id = :quiz_id WHERE id = :id");
                foreach ($questions as $question) {
                    $questionId = is_object($question) ? $question->getId() : $question; 
                    $query->execute([
                        'quiz_id' => $quizId,
                        'id' => $questionId
                    ]);
                }
            }
            echo $query->rowCount() . " record(s) ADDED successfully <br>";

        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    function DeleteQuiz($id)
    {
        try {
            $pdo = connexion::getConnexion();
            $query = $this->pdo->prepare("DELETE FROM quiz WHERE id = :id");
            $query->execute([
                'id' => $id
            ]);
            echo $query->rowCount() . " record(s) DELETED successfully <br>";
        } catch (PDOException $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function UpdateQuiz($quiz, $quizId, $questions)
    {
        try {
            $pdo = $this->pdo;
            $query = $pdo->prepare("UPDATE quiz SET title = :title, time = :time, difficulty = :difficulty WHERE id = :quiz_id");
            $query->execute([
                'title' => $quiz->getTitle(),
                'time' => $quiz->getTime(),
                'difficulty' => $quiz->getDifficulty(),
                'quiz_id' => $quizId
            ]);

            if (!empty($questions)) {
                $query = $pdo->prepare("UPDATE question SET quiz_id = :quiz_id WHERE id = :id");
                foreach ($questions as $question) {
                    $questionId = is_object($question) ? $question->getId() : $question;
                    $query->execute([
                        'quiz_id' => $quizId,
                        'id' => $questionId
                    ]);
                }
            }
            echo $query->rowCount() . " record(s) UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function ListQuestionIdsByQuizId($quizId)
{
    try {
        $pdo = $this->pdo;
        $query = $pdo->prepare("
            SELECT question.*
            FROM question
            INNER JOIN quiz ON question.quiz_id = quiz.id
            WHERE question.quiz_id = :quiz_id
        ");
        $query->execute(['quiz_id' => $quizId]);
        return $query->fetchAll();
    } catch (PDOException $e) {
        die('PDO Error: ' . $e->getMessage());
    }
}
    
}
