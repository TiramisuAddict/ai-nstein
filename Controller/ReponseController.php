<?php
require_once __DIR__ . '/../db.php';
require_once __DIR__ . '/../Model/Reponse.php';
class ReponseController
{
    public function ListReponce()
    {
        try {
            $pdo = connexion::getConnexion();
            $query = $pdo->prepare("SELECT * FROM reponse");
            $query->execute();
            return $query->fetchAll();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        }
    }
    public function ListReponseById($id)
    {
        try {
            $pdo = connexion::getConnexion();
            $query = $pdo->prepare("SELECT * FROM reponse WHERE id = :id");
            $query->execute(['id' => $id]);
            return $query->fetch();
        } catch (PDOException $e) {
            die('PDO Error: ' . $e->getMessage());
        }
    }
    function AddReponse($reponse)
    {
        try {
            $pdo = connexion::getConnexion();
            $query = $pdo->prepare("INSERT INTO reponse (text) VALUES (:text)");
            $query->execute([
                'text' => $reponse->getText(),
            ]);
            echo $query->rowCount() . " record(s) ADDED successfully <br>";
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    function DeleteReponse($id)
    {
        try {
            $pdo = connexion::getConnexion();
            $query = $pdo->prepare("DELETE FROM reponse WHERE id = :id");
            $query->execute([
                'id' => $id
            ]);
            echo $query->rowCount() . " record(s) DELETED successfully <br>";
        } catch (PDOException $e) {
            die('Error:' . $e->getMessage());
        }
    }
    function UpdateReponse($reponse, $id)
    {
        try {
            $pdo = connexion::getConnexion();
            $query = $pdo->prepare('UPDATE reponse SET text= :text WHERE id = :id');
            $query->execute([
                'text' => $reponse->getText(),
                'id' => $id
            ]);
            echo $query->rowCount() . " record(s) UPDATED successfully <br>";
        } catch (PDOException $e) {
            echo "Error: " . $e->getMessage();
        }
    }
}
