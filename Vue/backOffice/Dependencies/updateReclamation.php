<?php
require_once __DIR__ . '/../../../Model/Reclamation.php';
require_once '../../../Controller/ReclamationController.php';

$controller = new ReclamationController();

$error = null; // Variable pour stocker les messages d'erreur

// Vérifier l'ID de la réclamation
if (isset($_GET['id']) && is_numeric($_GET['id'])) {
    $id = intval($_GET['id']);
    $reclamation = $controller->getReclamationById($id);

    if (!$reclamation) {
        die("Reclamation not found!");
    }
} else {
    die("Invalid or missing ID!");
}

// Gérer la soumission du formulaire
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $title = trim($_POST['title'] ?? '');
    $type = trim($_POST['type'] ?? '');
    $message = trim($_POST['message'] ?? '');

    // Vérifier que tous les champs sont remplis
    if (!empty($title) && !empty($type) && !empty($message)) {
        // Créer un objet Reclamation avec les nouvelles données
        $updatedReclamation = new Reclamation($title, $type, $message);

        try {
            // Tenter de mettre à jour la réclamation
            $controller->updateReclamation($id, $updatedReclamation);

            // Rediriger en cas de succès
            header('Location: rec_list.php'); // Assurez-vous que cette page existe
            exit();
        } catch (Exception $e) {
            // En cas d'erreur, stocker le message d'erreur
            $error = "Error during update: " . $e->getMessage();
        }
    } else {
        $error = "All fields are required!";
    }
}

// Liste des types de réclamation (exemple)
$types = ["Technical", "Billing", "Customer Service", "Other"];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Reclamation</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="css/styles.css" /> <!-- Include shared CSS -->
</head>
<body>
    <div class="container mt-5">
        <h2 class="text-center mb-4">Edit Reclamation</h2>

        <!-- Affichage des erreurs -->
        <?php if ($error): ?>
            <div class="alert alert-danger text-center"><?= htmlspecialchars($error) ?></div>
        <?php endif; ?>

        <!-- Note: Modifier l'action pour appeler la même page -->
        <form action="updateReclamation.php?id=<?= htmlspecialchars($id) ?>" method="post">
            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input
                    type="text"
                    name="title"
                    id="title"
                    class="form-control"
                    value="<?= htmlspecialchars($_POST['title'] ?? $reclamation['titre']) ?>"
                    required
                />
            </div>
            <div class="mb-3">
                <label for="type" class="form-label">Type</label>
                <select
                    name="type"
                    id="type"
                    class="form-control"
                    required
                >
                    <?php
                    // Générer les options de la liste déroulante pour le type
                    foreach ($types as $t) {
                        // Si le type actuel correspond à celui de la réclamation, le marquer comme sélectionné
                        $selected = $t === $reclamation['type'] ? 'selected' : '';
                        echo "<option value=\"$t\" $selected>$t</option>";
                    }
                    ?>
                </select>
            </div>
            <div class="mb-3">
                <label for="message" class="form-label">Message</label>
                <textarea
                    name="message"
                    id="message"
                    rows="5"
                    class="form-control"
                    required
                ><?= htmlspecialchars($_POST['message'] ?? $reclamation['contenu']) ?></textarea>
            </div>

            <!-- Afficher la date de réclamation (en lecture seule) -->
            <div class="mb-3">
                <label for="date" class="form-label">Date of Reclamation</label>
                <input
                    type="text"
                    id="date"
                    class="form-control"
                    value="<?= htmlspecialchars($reclamation['date']) ?>"
                    readonly
                />
            </div>

            <div class="text-center">
                <button type="submit" class="btn btn-primary w-100">Update</button>
            </div>
        </form>
    </div>
</body>
</html>
