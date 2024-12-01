<?php
require_once '../Config.php';

class ExerciceController {
    public function getExercises() {
        $conn = config::getConnexion();
        $sql = "SELECT * FROM exercises";

        try {
            $query = $conn->prepare($sql);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function addExercise($exercise) {
        $conn = config::getConnexion();
        $sql = "INSERT INTO exercises (title, description, difficulty_level, project_file, image, author_name) 
                VALUES (:title, :description, :difficulty_level, :project_file, :image, :author_name)";

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                ':title' => $exercise['title'],
                ':description' => $exercise['description'],
                ':difficulty_level' => $exercise['difficulty_level'],
                ':project_file' => $exercise['project_file'],
                ':image' => $exercise['image'],
                ':author_name' => $exercise['author_name'],
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function updateExercise($id, $exercise) {
        $conn = config::getConnexion();
        $sql = "UPDATE exercises 
                SET title = :title, description = :description, difficulty_level = :difficulty_level, 
                    project_file = :project_file, image = :image, author_name = :author_name 
                WHERE id = :id";

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                ':id' => $id,
                ':title' => $exercise['title'],
                ':description' => $exercise['description'],
                ':difficulty_level' => $exercise['difficulty_level'],
                ':project_file' => $exercise['project_file'],
                ':image' => $exercise['image'],
                ':author_name' => $exercise['author_name'],
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function deleteExercise($id) {
        $conn = config::getConnexion();
        $sql = "DELETE FROM exercises WHERE id = :id";

        try {
            $query = $conn->prepare($sql);
            $query->execute([':id' => $id]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
    public function getExerciseById($id) {
        $conn = config::getConnexion();
        $sql = "SELECT * FROM exercises WHERE id = :id";

        try {
            $query = $conn->prepare($sql);
            $query->execute([':id' => $id]);
            return $query->fetch(); 
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>