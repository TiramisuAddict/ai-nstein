<?php
// Connexion à la base de données (remplacez les valeurs selon votre configuration)
$servername = "localhost";
$username = "root"; // ou votre nom d'utilisateur
$password = ""; // ou votre mot de passe
$dbname = "votre_base_de_donnees"; // Remplacez par le nom de votre base de données

// Créer une connexion
$conn = new mysqli($servername, $username, $password, $dbname);

// Vérifier la connexion
if ($conn->connect_error) {
    die("Échec de la connexion : " . $conn->connect_error);
}

// Traitement du formulaire si il est soumis
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $estimated_time = $_POST['estimated_time'];
    $difficulty_level = $_POST['difficulty_level'];

    // Requête SQL pour insérer les données
    $sql = "INSERT INTO quiz (title, estimated_time, difficulty_level) 
            VALUES ('$title', $estimated_time, '$difficulty_level')";

    if ($conn->query($sql) === TRUE) {
        echo "Le quiz a été ajouté avec succès !";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Fermer la connexion
$conn->close();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Quiz</title>
</head>

<body>

    <h1>Ajouter un nouveau quiz</h1>

    <!-- Formulaire HTML -->
    <form action="" method="POST">
        <label for="title">Titre du Quiz :</label>
        <input type="text" id="title" name="title" required><br><br>

        <label for="estimated_time">Temps estimé (en minutes) :</label>
        <input type="number" id="estimated_time" name="estimated_time" required><br><br>

        <label for="difficulty_level">Niveau de difficulté :</label>
        <select id="difficulty_level" name="difficulty_level" required>
            <option value="Easy">Facile</option>
            <option value="Medium">Moyenne</option>
            <option value="Hard">Difficile</option>
        </select><br><br>

        <input type="submit" value="Ajouter le Quiz">
    </form>

</body>

</html>
