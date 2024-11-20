<?php
require_once '../Controller/ArticleController.php';  

// Créer une instance de articleController
$articleController = new ArticleController();

// Récupérer tous les utilisateurs
$articles = $articleController->getArticles();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des articles</title>
    <style>
        body {
    font-family: Arial, sans-serif;
    margin: 0;
    padding: 0;
    background-color: #f9f9f9;
    color: #333;
}

/* Conteneur principal */
div {
    max-width: 1200px;
    margin: 20px auto;
    padding: 20px;
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
}

/* En-tête de la page */
h1 {
    text-align: center;
    color: #4CAF50;
    margin-bottom: 20px;
}

/* Styles pour la table */
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
}

table th, table td {
    padding: 12px 15px;
    text-align: left;
    border: 1px solid #ddd;
}

table th {
    background-color: #4CAF50;
    color: white;
    font-weight: bold;
}

table tr:nth-child(even) {
    background-color: #f2f2f2;
}

/* Boutons */
a.delete-btn {
    color: white;
    background-color: #e53935;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
}

a.update-btn {
    color: white;
    background-color: #4CAF50;
    padding: 8px 12px;
    text-decoration: none;
    border-radius: 4px;
    font-size: 14px;
}

a.delete-btn:hover {
    background-color: #c62828;
}

a.update-btn:hover {
    background-color: #45a049;
}

/* Réactivité pour les écrans étroits */
@media (max-width: 768px) {
    table th, table td {
        padding: 10px;
        font-size: 14px;
    }

    a.delete-btn, a.update-btn {
        padding: 6px 10px;
        font-size: 12px;
    }
}
</style>

</head>
<body>
    <div>
        <h1>Liste des articles</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>titre</th>
                    <th>contenu</th>
                    <th>image</th>
                    <th>auteur</th>
                    <th>date_creation</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($articles as $article): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($article['id']); ?></td>
                        <td><?php echo htmlspecialchars($article['titre']); ?></td>
                        <td><?php echo htmlspecialchars($article['contenu']); ?></td>
                        <td><?php echo htmlspecialchars($article['image']); ?></td>
                        <td><?php echo htmlspecialchars($article['auteur']); ?></td>
                        <td><?php echo htmlspecialchars($article['date_creation']); ?></td>
                        <td>
                        <td>
                        <a class="delete-btn" href="deleteArticle.php?id=<?php echo $article['id']; ?>" 
                         onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</a>
                        <a class="update-btn" href="expertamodifier.php?id=<?php echo $article['id']; ?>">Modifier</a>
                        </td>

                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>