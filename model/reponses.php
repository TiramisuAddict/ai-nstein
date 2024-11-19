<?php
// reponses.php

// Connexion à la base de données
include('db_connection.php'); // Inclure la connexion

// Ajouter une réponse
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['question_id'])) {
    $question_id = $_POST['question_id'];
    $reponse_text = $_POST['reponse_text'];
    $is_correct = isset($_POST['is_correct']) ? 1 : 0; // Déterminer si la réponse est correcte

    $sql = "INSERT INTO reponses (question_id, reponse_text, is_correct) VALUES ('$question_id', '$reponse_text', '$is_correct')";

    if ($conn->query($sql) === TRUE) {
        echo "Nouvelle réponse ajoutée avec succès !<br>";
    } else {
        echo "Erreur : " . $sql . "<br>" . $conn->error;
    }
}

// Afficher les réponses existantes pour chaque question
$sql = "SELECT * FROM question";
$result = $conn->query($sql);

echo "<h2>Liste des Réponses par Question</h2>";

if ($result->num_rows > 0) {
    while($question_row = $result->fetch_assoc()) {
        echo "<h3>Question: " . $question_row["question_text"] . "</h3>";
        
        // Récupérer les réponses pour cette question
        $question_id = $question_row["id"];
        $reponse_sql = "SELECT * FROM reponses WHERE question_id = $question_id";
        $reponse_result = $conn->query($reponse_sql);

        if ($reponse_result->num_rows > 0) {
            while($reponse_row = $reponse_result->fetch_assoc()) {
                $correct_text = $reponse_row['is_correct'] ? "Correct" : "Incorrect";
                echo "ID Réponse: " . $reponse_row["id"]. " - Réponse: " . $reponse_row["reponse_text"] . " (" . $correct_text . ")<br>";
            }
        } else {
            echo "Aucune réponse trouvée pour cette question.<br>";
        }
    }
} else {
    echo "Aucune question trouvée.<br>";
}

$conn->close();
?>

<h2>Ajouter une Nouvelle Réponse</h2>
<form method="POST" action="reponses.php">
    <label for="question_id">Choisir la question :</label>
    <select id="question_id" name="question_id" required>
        <?php
        // Charger les questions disponibles
        $question_sql = "SELECT * FROM question";
        $question_result = $conn->query($question_sql);

        if ($question_result->num_rows > 0) {
            while($question_row = $question_result->fetch_assoc()) {
                echo "<option value='".$question_row['id']."'>".$question_row['question_text']."</option>";
            }
        }
        ?>
    </select><br><br>

    <label for="reponse_text">Réponse :</label>
    <textarea id="reponse_text" name="reponse_text" required></textarea><br><br>

    <label for="is_correct">Est-ce la bonne réponse ?</label>
    <input type="checkbox" id="is_correct" name="is_correct"><br><br>

    <input type="submit" value="Ajouter Réponse">
</form>
