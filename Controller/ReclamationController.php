<?php
require_once (__DIR__ . '/../config.php');
require_once (__DIR__ . '/../Model/Reclamation.php');

class ReclamationController {

    // Récupérer toutes les réclamations
    public function getReclamation() {
        $conn = config::getConnexion(); // Connexion à la base de données
        $sql = "SELECT * FROM reclamation"; // Sélectionner toutes les réclamations

        try {
            $query = $conn->prepare($sql); // Préparation de la requête
            $query->execute(); // Exécution de la requête
            return $query->fetchAll(); // Retourne tous les résultats
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    // Ajouter une réclamation
    public function addReclamation($reclamation) {
        $conn = config::getConnexion(); // Connexion à la base de données
        $sql = "INSERT INTO reclamation (titre, type, contenu, date) 
                VALUES (:titre, :type, :contenu, :date)";

        try {
            $query = $conn->prepare($sql); // Préparation de la requête
            $query->execute([
                ':titre' => $reclamation->getTitre(),
                ':type' => $reclamation->getType(),
                ':contenu' => $reclamation->getContenu(),
                ':date' => $reclamation->getDate() // Ajout de la date
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    // Mettre à jour une réclamation
    public function updateReclamation($id, $reclamation) {
        $conn = config::getConnexion();
        $sql = "UPDATE reclamation 
                SET titre = :titre, type = :type, contenu = :contenu, date = :date 
                WHERE id = :id";

        try {
            $query = $conn->prepare($sql);
            $query->execute([
                ':id' => $id,
                ':titre' => $reclamation->getTitre(),
                ':type' => $reclamation->getType(),
                ':contenu' => $reclamation->getContenu(),
                ':date' => $reclamation->getDate() // Mettre à jour la date
            ]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    // Supprimer une réclamation
    public function deleteReclamation($id) {
        $conn = config::getConnexion();
        $sql = "DELETE FROM reclamation WHERE id = :id";

        try {
            $query = $conn->prepare($sql);
            $query->execute([':id' => $id]);
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    }

    // Récupérer une réclamation par ID
    public function getReclamationById($id) {
        $conn = config::getConnexion();
        $sql = "SELECT * FROM reclamation WHERE id = :id";
        try {
            $query = $conn->prepare($sql);
            $query->execute([':id' => $id]);
            return $query->fetch(); // Retourne une réclamation spécifique
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Récupérer les réclamations triées par ID
    public function getReclamationsSortedById($order = 'asc') {
        $conn = config::getConnexion();
        $sql = "SELECT * FROM reclamation ORDER BY id " . ($order === 'desc' ? 'DESC' : 'ASC');
        try {
            $query = $conn->prepare($sql);
            $query->execute();
            return $query->fetchAll(); // Retourne toutes les réclamations triées
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }

    // Récupérer les réclamations par type
    public function getReclamationsByType($type) {
        $conn = config::getConnexion();
        $sql = "SELECT * FROM reclamation WHERE type = :type";

        try {
            $query = $conn->prepare($sql);
            $query->execute([':type' => $type]);
            return $query->fetchAll(); // Retourne les réclamations du type spécifié
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>
