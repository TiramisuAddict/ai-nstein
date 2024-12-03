<?php
require_once '../Config.php';
require_once '../Model/Reclamation.php';

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
        // Ajout de la colonne `date` lors de l'insertion
        $sql = "INSERT INTO reclamation (titre, type, contenu, date) 
                VALUES (:titre, :type, :contenu, :date)";

        try {
            $query = $conn->prepare($sql); // Préparation de la requête
            // Exécution avec les valeurs de la réclamation, y compris la date
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
        // Mise à jour de la réclamation, y compris la date
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
            return $query->fetch();
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage());
        }
    }
}
?>
