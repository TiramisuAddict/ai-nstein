<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestion des Articles - Espace Expert</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/css/bootstrap.min.css">
</head>
<body>

<div class="container my-5">
    <!-- Titre de la page -->
    <h2 class="mb-4">Gestion des Articles</h2>

    <!-- Tableau listant les articles existants -->
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead class="table-light">
                    <tr>
                        <th>ID</th>
                        <th>Titre</th>
                        <th>Auteur</th>
                        <th>Date de Création</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Exemple de lignes (à remplacer dynamiquement avec PHP) -->
                    <tr>
                        <td>1</td>
                        <td>Exemple d'Article</td>
                        <td>Jean Dupont</td>
                        <td>2024-11-10</td>
                        <td>
                            <a href="modifier.php?id=1" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer.php?id=1" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer</a>
                        </td>
                    </tr>
                    <tr>
                        <td>2</td>
                        <td>Un Autre Article</td>
                        <td>Marie Curie</td>
                        <td>2024-11-12</td>
                        <td>
                            <a href="expert.html?id=<?= $article['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer.php?id=2" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?');">Supprimer</a>
                        </td>
                    </tr>
                    <!-- Fin des lignes d'exemple -->
                </tbody>
            </table>
        </div>
    </div>
</div>


<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/5.3.0/js/bootstrap.bundle.min.js"></script>
</body>
</html>