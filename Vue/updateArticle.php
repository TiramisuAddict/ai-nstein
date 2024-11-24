<?php
require_once '../Controller/articleController.php';
require_once '../Model/article.php';

// Vérification si l'article est soumis en POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $titre = $_POST['titre'];
    $contenu = $_POST['contenu'];
    $auteur = $_POST['auteur'];
    $date_creation = $_POST['date_creation'];

    // Gérer l'image si elle a été téléchargée
    $image = null;
    if (!empty($_FILES['image']['name'])) {
        // Traiter l'image : déplacer le fichier téléchargé dans le dossier "uploads/"
        $image = 'uploads/' . basename($_FILES['image']['name']);
        move_uploaded_file($_FILES['image']['tmp_name'], '../' . $image);
    }

    // Créer une instance du contrôleur
    $articleController = new articleController();

    // Mettre à jour l'article
    if ($articleController->updateArticle($id, $titre, $contenu, $auteur, $date_creation, $image)) {
        // Redirection vers la page de l'article mis à jour
        header('Location: back.php?id=' . $id);
        exit;
    } else {
        echo "Erreur lors de la mise à jour de l'article.";
    }
}
?>

