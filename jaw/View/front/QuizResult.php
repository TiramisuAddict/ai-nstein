<?php
include '../../../Controller/ReponseC.php';
$ReponseC = new ReponseC();

session_start();
$idQuiz = $_GET['idQuiz'];
$userAnswers = $_SESSION['quiz_answers'];

$totalQuestions = count($userAnswers);
$correctAnswers = 0;

foreach ($userAnswers as $idQuestion => $idResponse) {
    $response = $ReponseC->RecupererReponse($idResponse);
    if ($response['isCorrect'] === 'True') { // Adjust this comparison based on your database
        $correctAnswers++;
    }
}

$score = ($correctAnswers / $totalQuestions) * 100;
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
</head>
<body>
  
</body>
</html>
<section id="game-over">
    <div class="game-over-content">
        <div class="over-text-cont">
            <h1 data-heading="Game Over">Total Score:</h1>
            <h2><?php echo $score; ?>%</h2>
            <a id="btn" type="submit" href="quizList.php">Back to Quiz List</a>
        </div>
    </div>
</section>
<!-- REFRESH PAGE SECTION -->
