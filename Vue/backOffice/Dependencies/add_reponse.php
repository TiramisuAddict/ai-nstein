<?php
require_once (__DIR__ . '/../../../Controller/ReponseController.php');
require_once '../../../Model/Reponse.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $reclamation_id = $_POST['reclamation_id'];
    $reponse = $_POST['reponse'];

    $reponseObj = new Reponse($reclamation_id, $reponse); // Objet réponse
    $controller = new ReponseController();
    $controller->addReponse($reponseObj); // Appel de la méthode pour ajouter la réponse

    // Redirection après l'ajout
    header("Location: rec_list.php");
    exit();
}

$reclamation_id = $_GET['reclamation_id']; // Récupérer l'ID de la réclamation
?>

<!DOCTYPE html>
<html lang="fr">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Ajouter une Réponse</title>
  <style>
    /* Général */
    body {
      font-family: 'Arial', sans-serif;
      background-color: #f4f4f9;
      color: #333;
      margin: 0;
      padding: 0;
      display: flex;
      justify-content: center;
      align-items: center;
      min-height: 100vh;
    }

    /* Conteneur */
    .container {
      background-color: #fff;
      border-radius: 8px;
      box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
      width: 100%;
      max-width: 500px;
      padding: 20px;
      text-align: center;
    }

    /* Titre */
    h1 {
      font-size: 24px;
      color: #444;
      margin-bottom: 10px;
    }

    .subtitle {
      font-size: 14px;
      color: #777;
      margin-bottom: 20px;
    }

    /* Formulaire */
    .form {
      display: flex;
      flex-direction: column;
    }

    .form-group {
      margin-bottom: 15px;
      text-align: left;
    }

    label {
      font-size: 14px;
      font-weight: bold;
      color: #555;
      display: block;
      margin-bottom: 5px;
    }

    textarea {
      width: 100%;
      padding: 10px;
      border: 1px solid #ddd;
      border-radius: 4px;
      font-size: 14px;
      resize: none;
      transition: border-color 0.3s ease;
    }

    textarea:focus {
      border-color: #6e8efb;
      outline: none;
    }

    /* Bouton */
    .btn {
      background-color: #6e8efb;
      color: #fff;
      font-size: 14px;
      font-weight: bold;
      border: none;
      border-radius: 4px;
      padding: 10px 15px;
      cursor: pointer;
      transition: background-color 0.3s ease;
    }

    .btn:hover {
      background-color: #5a76d8;
    }
  </style>
</head>

<body>
  <div class="container">
    <h1>Ajouter une Réponse</h1>
    <p class="subtitle">Réclamation #<?= htmlspecialchars($reclamation_id); ?></p>
    <form method="POST" action="add_reponse.php" class="form">
      <input type="hidden" name="reclamation_id" value="<?= htmlspecialchars($reclamation_id); ?>">
      <div class="form-group">
        <label for="reponse">Réponse :</label>
        <textarea id="reponse" name="reponse" rows="5" placeholder="Écrivez votre réponse ici..." required></textarea>
      </div>
      <button type="submit" class="btn">Ajouter</button>
    </form>
  </div>
</body>

</html>
