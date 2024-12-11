<?php
require_once(__DIR__ . '/../../../Controller/ReponseController.php');

$controller = new ReponseController();
$reclamation_id = $_GET['reclamation_id']; // Récupérer l'ID de la réclamation
$reponses = $controller->getReponsesByReclamationId($reclamation_id); // Récupérer les réponses liées

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Modification de la réponse
    if (isset($_POST['update'])) {
        $id = $_POST['id'];
        $reponse = $_POST['reponse'];

        $reponseObj = new Reponse($reclamation_id, $reponse);
        $controller->updateReponse($id, $reponseObj);
    }

    // Suppression de la réponse
    if (isset($_POST['delete'])) {
        $id = $_POST['id'];
        $controller->deleteReponse($id);
    }

    header("Location: manage_reponses.php?reclamation_id=$reclamation_id"); // Actualiser la page
    exit();
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gérer les Réponses</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
        }
        th {
            background-color: #f2f2f2;
        }
        textarea {
            width: 100%;
            height: 50px;
        }
    </style>
</head>
<body>
    <h1>Gérer les Réponses pour la Réclamation #<?= htmlspecialchars($reclamation_id); ?></h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Réponse</th>
                <th>Date</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php if (!empty($reponses)): ?>
                <?php foreach ($reponses as $reponse): ?>
                    <tr>
                        <td><?= isset($reponse['id']) ? htmlspecialchars($reponse['id']) : 'Non défini'; ?></td>
                        <td><?= isset($reponse['reponse']) ? htmlspecialchars($reponse['reponse']) : 'Non défini'; ?></td>
                        <td><?= isset($reponse['created_at']) ? htmlspecialchars($reponse['created_at']) : 'Non défini'; ?></td>
                        <td>
                            <!-- Formulaire pour modifier une réponse -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= isset($reponse['id']) ? htmlspecialchars($reponse['id']) : ''; ?>">
                                <textarea name="reponse"><?= isset($reponse['reponse']) ? htmlspecialchars($reponse['reponse']) : ''; ?></textarea>
                                <button type="submit" name="update">Modifier</button>
                            </form>

                            <!-- Formulaire pour supprimer une réponse -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="id" value="<?= isset($reponse['id']) ? htmlspecialchars($reponse['id']) : ''; ?>">
                                <button type="submit" name="delete" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réponse ?');">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                <?php endforeach; ?>
            <?php else: ?>
                <tr>
                    <td colspan="4">Aucune réponse trouvée pour cette réclamation.</td>
                </tr>
            <?php endif; ?>
        </tbody>
    </table>
</body>
</html>
