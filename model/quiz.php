<?php
// quiz.php

// Connexion à la base de données
include('db_connection.php'); // Inclure la connexion

// Ajouter un quiz
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST['title'];
    $estimated_time = $_POST['estimated_time'];
    $difficulty_level = $_POST['difficulty_level'];

    $sql = "INSERT INTO quiz (title, estimated_time, difficulty_level) VALUES ('$title', '$estimated_time', '$difficulty_level')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouveau quiz ajouté avec succès !<br>";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Afficher les quiz existants
$sql = "SELECT * FROM quiz";
$result = $conn->query($sql);

echo "<h2>Liste des Quiz</h2>";

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "ID: " . $row["id"]. " - Titre: " . $row["title"]. " - Temps estimé: " . $row["estimated_time"]. " minutes - Niveau de difficulté: " . $row["difficulty_level"] . "<br>";
    }
} else {
    echo "Aucun quiz trouvé.<br>";
}

$conn->close();
?>

<h2>Ajouter un Nouveau Quiz</h2>
<form method="POST" action="quiz.php">
    <label for="title">Titre :</label>
    <input type="text" id="title" name="title" required><br><br>

    <label for="estimated_time">Temps estimé (en minutes) :</label>
    <input type="number" id="estimated_time" name="estimated_time" required><br><br>

    <label for="difficulty_level">Niveau de difficulté :</label>
    <select id="difficulty_level" name="difficulty_level">
        <option value="Easy">Facile</option>
        <option value="Medium">Moyen</option>
        <option value="Hard">Difficile</option>
    </select><br><br>

    <input type="submit" value="Ajouter Quiz">
</form>
