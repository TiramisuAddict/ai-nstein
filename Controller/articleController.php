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
        $stmt = $this->pdo->query("SELECT id, titre, contenu, image, auteur, date_creation FROM articles"); 
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    // Récupérer un article par ID
    public function getArticleById($id) {
        $stmt = $this->pdo->prepare("SELECT id, titre, contenu, image, auteur, date_creation FROM articles WHERE id = :id"); 
        $stmt->execute(['id' => $id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    // Supprimer un article par ID
    public function deleteArticle($id) {
        $stmt = $this->pdo->prepare("DELETE FROM articles WHERE id = :id");
        $stmt->execute(['id' => $id]);
    }

    // Mettre à jour un article
    public function updateArticle($id, $title, $contenu, $author, $image = null) {
        $date_creation = date('Y-m-d');  // Assurer que la date de création est mise à jour

        // Si une image est fournie
        if ($image) {
            $stmt = $this->pdo->prepare("UPDATE articles SET titre = :titre, contenu = :contenu,  image = :image, auteur = :auteur, date_creation = :date_creation WHERE id = :id"); 
            $stmt->execute([
                'id' => $id,
                'titre' => $title,
                'contenu' => $contenu,
                'image' => $image,
                'auteur' => $author,
                'date_creation' => $date_creation
            ]);
        } else {
            // Si aucune image n'est fournie
            $stmt = $this->pdo->prepare("UPDATE articles SET titre = :titre, contenu = :contenu, auteur = :auteur, date_creation = :date_creation WHERE id = :id"); 
            $stmt->execute([
                'id' => $id,
                'titre' => $title,
                'contenu' => $contenu,
                'auteur' => $author,
                'date_creation' => $date_creation
            ]);
        }
    }

    // Ajouter un nouvel article avec une image
    public function addArticle($article) {
        $conn = config::getConnexion(); // Connexion à la base de données
        $sql = "INSERT INTO articles (
                    titre, contenu, image, auteur, date_creation
                ) VALUES (
                    :titre, :contenu, :image, :auteur, :date_creation
                )";
    
        try {
            $query = $conn->prepare($sql); // Préparation de la requête
            $query->execute([
                ':titre' => $article->getTitre(),
                ':contenu' => $article->getContenu(),
                ':image' => $article->getImage(),
                ':auteur' => $article->getAuteur(),
                ':date_creation' => $article->getDateCreation()
            ]); // Exécution avec les valeurs de l'article
        } catch (Exception $e) {
            die('Erreur: ' . $e->getMessage()); // Gestion des erreurs
        }
    

}

    public function uploadImage($file) {
        // Vérifiez que le fichier a été uploadé sans erreur
        if ($file['error'] !== UPLOAD_ERR_OK) {
            return null; // Ou gérez l'erreur comme vous le souhaitez
        }

        // Définir le dossier de destination
        $targetDir = "../uploads/";
        if (!is_dir($targetDir)) {
            mkdir($targetDir, 0777, true); // Créez le dossier s'il n'existe pas
        }

        // Générer un nom unique pour le fichier
        $fileName = uniqid() . "_" . basename($file['name']);
        $targetFile = $targetDir . $fileName;

        // Vérifiez le type de fichier (par exemple, uniquement les images)
        $fileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));
        $allowedTypes = ['jpg', 'jpeg', 'png', 'gif'];

        if (!in_array($fileType, $allowedTypes)) {
            return null; // Retourner null si le type n'est pas autorisé
        }

        // Déplacer le fichier dans le dossier cible
        if (move_uploaded_file($file['tmp_name'], $targetFile)) {
            return $fileName; // Retourner le nom du fichier pour le stocker en base de données
        } else {
            return null; // Retourner null si le déplacement échoue
        }
    }
}




?>