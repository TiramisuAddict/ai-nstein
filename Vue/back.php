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

  <!-- Bootstrap CSS -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

  <!-- Custom Styles -->
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background-color: #f9f9f9;
      color: #333;
    }

    /* Navbar */
    .navbar {
      background-color: ;
    }

    .navbar-brand img {
      max-width: 120px;
    }

    /* Page title section */
    .page-title {
      background: url('images/backgrounds/page-title.jpg') no-repeat center center/cover;
      color: white;
      padding: 100px 0;
      text-align: center;
    }

    .page-title h1 {
      font-size: 2.5em;
      font-weight: bold;
    }

    /* Table container */
    .table-container {
      margin-top: 50px;
      padding: 20px;
      background: white;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    /* Table */
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
      background-color: #007bff;
      color: white;
      font-weight: bold;
    }

    table tr:nth-child(even) {
      background-color: ;
    }

    /* Buttons */
    a.delete-btn,
    a.update-btn {
      color: white;
      padding: 8px 12px;
      text-decoration: none;
      border-radius: 4px;
      font-size: 14px;
    }

    a.delete-btn {
      background-color: #e53935;
    }

    a.update-btn {
      background-color: #4CAF50;
    }

    a.delete-btn:hover {
      background-color: #c62828;
    }

    a.update-btn:hover {
      background-color: #45a049;
    }

    /* Footer */
    .footer {
      background-color: #f8f9fa;
      padding: 20px;
      text-align: center;
      margin-top: 50px;
    }

    /* Responsive design */
    @media (max-width: 768px) {
      .navbar-brand img {
        max-width: 80px;
      }

      .page-title h1 {
        font-size: 1.8em;
      }

      table th, table td {
        font-size: 14px;
        padding: 10px;
      }

      a.delete-btn, a.update-btn {
        padding: 6px 10px;
        font-size: 12px;
      }
    }
  </style>
</head>

<body>

  <!-- Navbar -->
  <nav class="navbar navbar-expand-lg navbar-dark fixed-top">
    <a class="navbar-brand" href="index.html">
      <img src="images/logo.png" alt="Logo">
    </a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
      <ul class="navbar-nav ml-auto">
        <li class="nav-item active">
          <a class="nav-link" href="#">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Blog</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="#">Contact</a>
        </li>
      </ul>
    </div>
  </nav>

  <!-- Page title section -->
  <section class="page-title">
    <h1>Liste des Articles</h1>
  </section>

  <!-- Main content -->
  <div class="container table-container">
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Titre</th>
          <th>Contenu</th>
          <th>Image</th>
          <th>Auteur</th>
          <th>Date de création</th>
          <th>Actions</th>
        </tr>
      </thead>
      <tbody>
        <?php foreach ($articles as $article): ?>
          <tr>
            <td><?php echo htmlspecialchars($article['id']); ?></td>
            <td><?php echo htmlspecialchars($article['titre']); ?></td>
            <td><?php echo htmlspecialchars($article['contenu']); ?></td>
            <td>
              <?php if (!empty($article['image'])): ?>
                <img src="uploads/<?php echo htmlspecialchars($article['image']); ?>" alt="Image" style="max-width: 100px; max-height: 100px;">
              <?php else: ?>
                Aucune image
              <?php endif; ?>
            </td>
            <td><?php echo htmlspecialchars($article['auteur']); ?></td>
            <td><?php echo htmlspecialchars($article['date_creation']); ?></td>
            <td>
              <a class="delete-btn" href="deleteArticle.php?id=<?php echo $article['id']; ?>" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cet article ?')">Supprimer</a>
              <a class="update-btn" href="expertamodifier.php?id=<?php echo $article['id']; ?>">Modifier</a>
            </td>
          </tr>
        <?php endforeach; ?>
      </tbody>
    </table>
  </div>



</body>

</html>
