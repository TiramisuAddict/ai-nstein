<?php
require_once '../Controller/commentController.php';  

// Créer une instance de CommentaireController
$commentController = new CommentaireController();

// Récupérer tous les commentaires
$commentaires = $commentController->getCommentaires();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des commentaires</title>
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

        table td {
            word-wrap: break-word; /* Permet de couper les mots longs */
            word-break: break-word;
            max-width: 300px; /* Largeur maximale de la cellule */
            white-space: normal; /* Active le retour à la ligne */
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
        <h1>Liste des commentaires</h1>
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>ID Article</th>
                    <th>Message</th>
                    <th>Auteur</th>
                    <th>Date de Publication</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($commentaires as $commentaire): ?>
                    <tr>
                        <td><?php echo htmlspecialchars($commentaire['id']); ?></td>
                        <td><?php echo htmlspecialchars($commentaire['article_id']); ?></td>
                        <td><?php echo htmlspecialchars($commentaire['message']); ?></td>
                        <td><?php echo htmlspecialchars($commentaire['auteur']); ?></td>
                        <td><?php echo htmlspecialchars($commentaire['date_publication']); ?></td>
                        <td>
                            <a class="delete-btn" href="deleteCommentaire.php?id=<?php echo $commentaire['id']; ?>" 
                               onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce commentaire ?')">Supprimer</a>
                            <a class="update-btn" href="modifierCommentaire.php?id=<?php echo $commentaire['id']; ?>">Modifier</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>
</html>
