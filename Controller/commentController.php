<?php
require_once '../Config.php';
require_once '../Model/commentaire.php';

class CommentaireController {

    private $pdo;

    public function __construct() {
        // Connexion à la base de données
        $this->pdo = new PDO('mysql:host=localhost;dbname=youssefbd', 'root', ''); 
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Récupérer tous les commentaires
    public function getCommentaires() {
        $stmt = $this->pdo->query("SELECT id, message, date_publication, auteur, article_id FROM commentaires");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer les commentaires d'un article spécifique
    public function getCommentairesByArticleId($article_id) {
        $stmt = $this->pdo->prepare("SELECT id, message, date_publication, auteur FROM commentaires WHERE article_id = :article_id");
        $stmt->execute(['article_id' => $article_id]);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Ajouter un nouveau commentaire
    
        public function addComment(Commentaire $commentaire) {
            try {
                // Connexion à la base de données
                $db = new PDO('mysql:host=localhost;dbname=youssefbd', 'root', '');
    
                // Requête SQL pour insérer le commentaire
                $stmt = $db->prepare(
                    "INSERT INTO commentaires (message, date_publication, auteur, article_id) 
                    VALUES (:message, :date_publication, :auteur, :article_id)"
                );
    
                // Exécuter la requête avec les données du commentaire
                return $stmt->execute([
                    ':message' => $commentaire->getMessage(),
                    ':date_publication' => $commentaire->getDatePublication(),
                    ':auteur' => $commentaire->getAuteur(),
                    ':article_id' => $commentaire->getArticleId(),
                ]);
            } catch (PDOException $e) {
                throw new Exception("Erreur lors de l'insertion du commentaire : " . $e->getMessage());
            }
        }
 
    

    // Mettre à jour un commentaire
    public function updateCommentaire($id, $message, $auteur) {
        $sql = "UPDATE commentaires 
                SET message = :message, auteur = :auteur 
                WHERE id = :id";

        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([
            ':id' => $id,
            ':message' => $message,
            ':auteur' => $auteur
        ]);
    }

    // Supprimer un commentaire
    public function deleteCommentaire($id) {
        $sql = "DELETE FROM commentaires WHERE id = :id";
        $stmt = $this->pdo->prepare($sql);
        $stmt->execute([':id' => $id]);
    }
}

?>
