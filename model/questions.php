<?php
// questions.php

// Connexion à la base de données
include('db_connection.php'); // Inclure la connexion

// Ajouter une question
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['quiz_id'])) {
    $quiz_id = $_POST['quiz_id'];
    $question_text = $_POST['question_text'];

    $sql = "INSERT INTO question (question_text, quiz_id) VALUES ('$question_text', '$quiz_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvelle question ajoutée avec succès !<br>";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Afficher les questions existantes pour chaque quiz
$sql = "SELECT * FROM quiz";
$result = $conn->query($sql);

echo "<h2>Liste des Questions par Quiz</h2>";

if ($result->num_rows > 0) {
    while($quiz_row = $result->fetch_assoc()) {
        echo "<h3>Quiz: " . $quiz_row["title"] . "</h3>";
        
        // Récupérer les questions pour ce quiz
        $quiz_id = $quiz_row["id"];
        $question_sql = "SELECT * FROM question WHERE quiz_id = $quiz_id";
        $question_result = $conn->query($question_sql);

        if ($question_result->num_rows > 0) {
            while($question_row = $question_result->fetch_assoc()) {
                echo "ID Question: " . $question_row["id"]. " - Question: " . $question_row["question_text"] . "<br>";
            }
        } else {
            echo "Aucune question trouvée pour ce quiz.<br>";
        }
    }
} else {
    echo "Aucun quiz trouvé.<br>";
}

$conn->close();
?>

<h2>Ajouter une Nouvelle Question</h2>
<form method="POST" action="questions.php">
    <label for="quiz_id">Choisir le quiz :</label>
    <select id="quiz_id" name="quiz_id" required>
        <?php
        // Charger les quiz disponibles
        $quiz_sql = "SELECT * FROM quiz";
        $quiz_result = $conn->query($quiz_sql);

        if ($quiz_result->num_rows > 0) {
            while($quiz_row = $quiz_result->fetch_assoc()) {
                echo "<option value='".$quiz_row['id']."'>".$quiz_row['title']."</option>";
            }
        }
        ?>
    </select><br><br>

    <label for="question_text">Question :</label>
    <textarea id="question_text" name="question_text" required></textarea><br><br>

    <input type="submit" value="Ajouter Question">
</form>
