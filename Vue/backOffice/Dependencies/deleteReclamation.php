<?php
require_once '../../../Controller/ReclamationController.php'; // Inclure le contrôleur

// Activer l'affichage des erreurs pour le débogage
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']); // Sécuriser l'ID

    // Créer une instance du contrôleur
    $ReclamationController = new ReclamationController();

    try {
        // Appeler la méthode deleteReclamation pour supprimer la réclamation
        $ReclamationController->deleteReclamation($id);

        // Rediriger vers la page de la liste des réclamations après suppression
        header('Location: rec_list.php'); // Correction du nom du fichier
        exit();
    } catch (Exception $e) {
        // Afficher une erreur générique en production
        error_log("Erreur de suppression : " . $e->getMessage());
        echo "Erreur lors de la suppression de la réclamation.";
    }
} else {
    // Si l'ID n'est pas passé ou invalide, rediriger vers la liste des réclamations
    header('Location: rec_list.php'); // Correction du nom du fichier
    exit();
}
?>
