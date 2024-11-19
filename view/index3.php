<?php
// Inclure le fichier de connexion
include 'db_connection.php';

// Récupérer les données de la table 'quiz'
$sql = "SELECT * FROM quiz";
$result = $conn->query($sql);

// Afficher les résultats
if ($result->num_rows > 0) {
    echo "<h1>Liste des quizzes</h1>";
    while ($row = $result->fetch_assoc()) {
        echo "ID : " . $row['id'] . " - Titre : " . $row['title'] . " - Temps estimé : " . $row['estimated_time'] . " mins - Difficulté : " . $row['difficulty_level'] . "<br>";
    }
} else {
    echo "Aucun quiz trouvé.";
}

// Fermer la connexion
$conn->close();
?>
