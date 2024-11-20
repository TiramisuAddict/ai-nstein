<?php
require_once '../Controller/articleController.php';
require_once '../Model/article.php'; // Inclure le contrôleur d'article

$articleController = new articleController();
$message = "";

// Gestion des requêtes POST pour ajouter ou modifier un article
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $titre = $_POST['titre'] ?? '';
    $auteur = $_POST['auteur'] ?? '';
    $contenu = $_POST['contenu'] ?? '';
    $date_creation = $_POST['date_creation'] ?? '';

    $image = null;

    // Upload simplifié de l'image
    if (!empty($_FILES['image']['tmp_name'])) {
        $image = $articleController->uploadImage($_FILES['image']);

    }
        // Ajouter un nouvel article
        $article = new Article ($titre, $contenu, $image, $auteur, $date_creation);
        $articleController = new ArticleController();


        $articleController->addArticle($article);
   
    
}