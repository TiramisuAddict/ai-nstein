<?php
require_once '../Controller/articleController.php'; // Inclure le contrôleur

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id']; // Récupérer l'ID de l'utilisateur à supprimer

    // Créer une instance du contrôleur
    $articleController = new articleController();

    try {
        // Appeler la méthode deleteUser pour supprimer l'utilisateur
        $articleController->deleteArticle($id);

        // Rediriger vers la page de la liste des utilisateurs après suppression
        header('Location: back.php');
        exit();
    } catch (Exception $e) {
        echo "Erreur: " . $e->getMessage(); // Afficher l'erreur si la suppression échoue
    }
} else {
    // Si l'ID n'est pas passé, rediriger vers la liste des utilisateurs
    header('Location: back.php');
    exit();
}
?>