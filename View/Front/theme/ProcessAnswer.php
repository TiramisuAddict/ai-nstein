<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $idQuiz = $_POST['idQuiz'];
    $idQuestion = $_POST['idQuestion'];
    $selectedResponse = $_POST['selectedResponse'];

    // Save user response in session (or database for persistence)
    $_SESSION['quiz_answers'][$idQuestion] = $selectedResponse;

    // Redirect to the next question or results page
    $nextQuestion = $_POST['nextQuestion'];
    header("Location: StartQuiz.php?idQuiz=$idQuiz&question=$nextQuestion");
    exit();
}
?>
