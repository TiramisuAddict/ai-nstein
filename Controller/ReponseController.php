<?php
require_once (__DIR__ . '/../config.php');
require_once (__DIR__ . '/../Model/Reponse.php');

class ReponseController {
    // Récupérer toutes les réponses
    public function getReponses() {
        $conn = config::getConnexion(); // Connexion à la base de données
        $sql = "SELECT * FROM reponse"; // Sélectionner toutes les réponses

        try {
            $query = $conn->prepare($sql); // Préparation de la requête
            $query->execute(); // Exécution de la requête
            return $query->fetchAll(); // Retourne tous les résultats
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    // Ajouter une réponse
    public function addReponse($reponse) {
        $conn = config::getConnexion(); // Connexion à la base de données
        // Ajout de la colonne `created_at` lors de l'insertion
        $sql = "INSERT INTO reponse (reclamation_id, contenu, date_rep) 
                VALUES (:reclamation_id, :reponse, :created_at)";

        try {
            $query = $conn->prepare($sql); // Préparation de la requête
            // Exécution avec les valeurs de la réponse, y compris la date de création
            $query->execute([
                ':reclamation_id' => $reponse->getReclamationId(),
                ':reponse' => $reponse->getReponse(),
                ':created_at' => $reponse->getCreatedAt() // Ajout de la date de création
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    // Mettre à jour une réponse
    public function updateReponse($id, $reponse) {
        $conn = config::getConnexion();
        // Mise à jour de la réponse, y compris la date de création
        $sql = "UPDATE reponse 
                SET reclamation_id = :reclamation_id, reponse = :reponse, created_at = :created_at 
                WHERE id = :id";

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                ':id' => $id,
                ':reclamation_id' => $reponse->getReclamationId(),
                ':reponse' => $reponse->getReponse(),
                ':created_at' => $reponse->getCreatedAt() // Mettre à jour la date
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    // Supprimer une réponse
    public function deleteReponse($id) {
        $conn = config::getConnexion();
        $sql = "DELETE FROM reponse WHERE id = :id";

        try {
            $query = $conn->prepare($sql);
            $query->execute([':id' => $id]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    // Récupérer une réponse par ID
    public function getReponseById($id) {
        $conn = config::getConnexion();
        $sql = "SELECT * FROM reponse WHERE id = :id";

        try {
            $query = $conn->prepare($sql);
            $query->execute([':id' => $id]);
            return $query->fetch();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Récupérer toutes les réponses d'une réclamation
    public function getReponsesByReclamationId($reclamation_id) {
        $conn = config::getConnexion();
        $sql = "SELECT * FROM reponse WHERE reclamation_id = :reclamation_id";

        try {
            $query = $conn->prepare($sql);
            $query->execute([':reclamation_id' => $reclamation_id]);
            return $query->fetchAll(); // Retourne toutes les réponses liées à une réclamation
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>
