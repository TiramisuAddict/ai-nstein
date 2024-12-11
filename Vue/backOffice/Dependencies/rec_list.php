<?php
require_once '../../../Controller/ReclamationController.php';
require_once '../../../Controller/ReponseController.php';

// Instancier les contrôleurs
$reclamationController = new ReclamationController();
$reponseController = new ReponseController();

// Initialisation des paramètres
$sort_order = isset($_GET['sort']) ? $_GET['sort'] : 'asc'; // Tri croissant par défaut
$search_id = isset($_GET['search_id']) ? $_GET['search_id'] : null;
$filter_type = isset($_GET['type']) ? $_GET['type'] : null; // Filtre par type

// Récupérer les réclamations selon le tri, la recherche et le type
if ($search_id) {
    $reclamations = [$reclamationController->getReclamationById($search_id)];
    $reclamations = array_filter($reclamations); // Filtrer les résultats vides
} elseif ($filter_type) {
    $reclamations = $reclamationController->getReclamationsByType($filter_type); // Réclamations par type
} else {
    $reclamations = $reclamationController->getReclamationsSortedById($sort_order); // Réclamations triées
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>Liste des Réclamations</title>
    <!-- Intégration de Bootstrap -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">
    <!-- Styles personnalisés -->
    <style>
        .active-sort {
            font-weight: bold;
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <h1 class="text-center mb-4">Liste des Réclamations</h1>

        <!-- Formulaire de recherche et filtre -->
        <form method="GET" class="d-flex justify-content-between mb-3">
            <div class="d-flex">
                <input type="number" name="search_id" class="form-control w-25 me-2" placeholder="Rechercher par ID" value="<?= htmlspecialchars($search_id); ?>">
                <select name="type" class="form-select w-25 me-2">
                    <option value="">-- Filtrer par Type --</option>
                    <option value="Technical Issue" <?= $filter_type === 'Technical Issue' ? 'selected' : ''; ?>>Technical Issue</option>
                    <option value="Customer Service" <?= $filter_type === 'Customer Service' ? 'selected' : ''; ?>>Customer Service</option>
                    <option value="Billing" <?= $filter_type === 'Billing' ? 'selected' : ''; ?>>Billing</option>
                    <option value="Other" <?= $filter_type === 'Other' ? 'selected' : ''; ?>>Other</option>
                </select>
                <button type="submit" class="btn btn-primary">Filtrer</button>
            </div>
            <a href="rect_list.php" class="btn btn-secondary">Réinitialiser</a>
        </form>

        <!-- Tri des réclamations -->
        <div class="mb-3">
            <a href="?sort=asc" class="btn btn-outline-primary <?= $sort_order === 'asc' ? 'active-sort' : ''; ?>">Tri Croissant</a>
            <a href="?sort=desc" class="btn btn-outline-primary <?= $sort_order === 'desc' ? 'active-sort' : ''; ?>">Tri Décroissant</a>
        </div>

        <!-- Tableau des réclamations -->
        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Type</th>
                    <th>Contenu</th>
                    <th>Date</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php if ($reclamations): ?>
                    <?php foreach ($reclamations as $reclamation): ?>
                        <tr>
                            <td><?= htmlspecialchars($reclamation['id']); ?></td>
                            <td><?= htmlspecialchars($reclamation['titre']); ?></td>
                            <td><?= htmlspecialchars($reclamation['type']); ?></td>
                            <td><?= htmlspecialchars($reclamation['contenu']); ?></td>
                            <td><?= htmlspecialchars($reclamation['date']); ?></td>
                            <td>
                                <!-- Modifier une réclamation -->
                                <a href="updateReclamation.php?id=<?= $reclamation['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>

                                <!-- Supprimer une réclamation -->
                                <a href="deleteReclamation.php?id=<?= $reclamation['id']; ?>" 
                                   class="btn btn-danger btn-sm" 
                                   onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réclamation ?');">
                                   Supprimer
                                </a>

                                <!-- Ajouter une réponse -->
                                <a href="add_reponse.php?reclamation_id=<?= $reclamation['id']; ?>" class="btn btn-primary btn-sm">Ajouter Réponse</a>

                                <!-- Gérer les réponses -->
                                <a href="manage_reponses.php?reclamation_id=<?= $reclamation['id']; ?>" class="btn btn-secondary btn-sm">Gérer Réponses</a>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                <?php else: ?>
                    <tr>
                        <td colspan="6" class="text-center text-danger">Aucune réclamation trouvée.</td>
                    </tr>
                <?php endif; ?>
            </tbody>
        </table>
    </div>

    <!-- Intégration de Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
