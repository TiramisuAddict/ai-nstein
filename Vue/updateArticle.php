<?php
require_once '../Controller/articleController.php'; // Inclure le contrôleur d'article
require_once '../Model/article.php'; // Inclure le modèle d'article

// Vérifier si les données ont été envoyées via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['id'])) {
    // Récupérer les données envoyées
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $auteur = $_POST['auteur'];
    $date_creation = $_POST['date_creation'];
    
    // Vérifier si une nouvelle image est téléchargée
    $image = $_FILES['image']['name'];
    $image_tmp = $_FILES['image']['tmp_name'];

    // Si une image est téléchargée, déplacer l'image dans le répertoire souhaité
    if (!empty($image)) {
        $image_path = 'uploads/' . basename($image);
        move_uploaded_file($image_tmp, $image_path);
    } else {
        // Si aucune image n'est téléchargée, conserver l'image existante
        $articleController = new articleController();
        $existingArticle = $articleController->getArticleById($id);
        $image_path = $existingArticle['image'];
    }

    // Créer une instance de ArticleController pour mettre à jour l'article
    $articleController = new articleController();

    try {
        // Mettre à jour l'article dans la base de données
        $articleController->updateArticle($id, $titre, $contenu, $auteur, $date_creation, $image_path);
        
        // Rediriger vers la liste des articles après la mise à jour
        header('Location: back.php?message=Article mis à jour avec succès');
        exit();
    } catch (Exception $e) {
        echo "Erreur lors de la mise à jour de l'article : " . $e->getMessage();
    }
} else {
    // Si l'ID n'est pas présent, rediriger vers la liste des articles
    header('Location: back.php');
    exit();
}
?>
