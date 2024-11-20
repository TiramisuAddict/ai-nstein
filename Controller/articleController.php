<?php
require_once '../Config.php';
require_once '../Model/article.php';

class ArticleController {

    private $pdo;

    public function __construct() {
        // Connexion à la base de données
        $this->pdo = new PDO('mysql:host=localhost;dbname=youssefbd', 'root', ''); 
        $this->pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }

    // Récupérer tous les articles
    public function getArticles() {
        $stmt = $this->pdo->query("SELECT id, titre, auteur, contenu, image, date_creation FROM articles"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un article par ID
    public function getArticleById($id) {
        $stmt = $this->pdo->prepare("SELECT id, titre, auteur, contenu, image, date_creation FROM articles WHERE id = :id"); 
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Supprimer un article par ID
    public function deleteArticle($id) {
        $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    // Mettre à jour un article
    public function updateArticle($id, $title, $author, $image = null) {
        $date_creation = date('Y-m-d');  // Assurer que la date de création est mise à jour

        // Si une image est fournie
        if ($image) {
            $stmt = $this->pdo->prepare("UPDATE articles SET titre = :titre, auteur = :auteur, image = :image, date_creation = :date_creation WHERE id = :id"); // contenu exclu
            $stmt->execute([
                'id' => $id,
                'titre' => $title,
                'auteur' => $author,
                'image' => $image,
                'date_creation' => $date_creation
            ]);
        } else {
            // Si aucune image n'est fournie
            $stmt = $this->pdo->prepare("UPDATE articles SET titre = :titre, auteur = :auteur, date_creation = :date_creation WHERE id = :id"); 
            $stmt->execute([
                'id' => $id,
                'titre' => $title,
                'auteur' => $author,
                'date_creation' => $date_creation
            ]);
        }
    }

    // Ajouter un nouvel article avec une image
    public function addArticle($article) {
        $conn = config::getConnexion(); // Connexion à la base de données
        $sql = "INSERT INTO articles (
                    titre, image, contenu, auteur, date_creation
                ) VALUES (
                    :titre, :image, :contenu, :auteur, :date_creation
                )";
    
        try {
            $query = $conn->prepare($sql); // Préparation de la requête
            $query->execute([
                ':titre' => $article->getTitre(),
                ':image' => $article->getImage(),
                ':contenu' => $article->getContenu(),
                ':auteur' => $article->getAuteur(),
                ':date_creation' => $article->getDateCreation()
            ]); // Exécution avec les valeurs de l'article
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    

}


}
?>