<?php
include '../../../Controller/QuestionC.php';
include_once '../../../Controller/ReponseC.php';

$QuestionC = new QuestionC();
$ReponseC = new ReponseC();

// Get quiz ID
if (!isset($_GET['idQuiz'])) {
    die('Quiz ID is missing!');
}

$idQuiz = $_GET['idQuiz'];
$questions = $QuestionC->AfficherQuestions($idQuiz);
$currentQuestionIndex = isset($_GET['question']) ? (int)$_GET['question'] : 0;

if ($currentQuestionIndex < count($questions)) {
    $currentQuestion = $questions[$currentQuestionIndex];
    $responses = $ReponseC->AfficherReponses($currentQuestion['idQuestion']);
} else {
    header("Location: QuizResult.php?idQuiz=$idQuiz"); // Redirect to result page after the quiz
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Quiz</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <!-- QUIZ ONE -->
    <section class="section-1" id="section-1">
        <main>
            <div class="text-container">
                <h3>Pure CSS Quiz</h3>
                <p>QUESTION <?php echo $currentQuestionIndex + 1; ?> OF <?php echo count($questions); ?></p>
                <p><?php echo $currentQuestion['text']; ?> ?</p>
            </div>
            <form method="POST" action="ProcessAnswer.php">
                <div class="quiz-options">
                    <?php foreach ($responses as $index => $response) { ?>
                        <label class="radio-label" for="response<?php echo $response['idReponse']; ?>">
                            <input 
                                type="radio" 
                                class="input-radio" 
                                id="response<?php echo $response['idReponse']; ?>" 
                                name="selectedResponse" 
                                value="<?php echo $response['idReponse']; ?>">
                            <span class="alphabet"><?php echo chr(65 + $index); // Convert index to A, B, C, etc. ?></span>
                            <?php echo $response['text']; ?>
                            <img class="icon" src="https://res.cloudinary.com/dvhndpbun/image/upload/v1588518387/jdsjkefkefkefefexco.svg" alt="">
                        </label>
                    <?php } ?>
                </div>
                <!-- Hidden Inputs -->
                <input type="hidden" name="idQuestion" value="<?php echo $currentQuestion['idQuestion']; ?>">
                <input type="hidden" name="idQuiz" value="<?php echo $idQuiz; ?>">
                <input type="hidden" name="nextQuestion" value="<?php echo $currentQuestionIndex + 1; ?>">

                <!-- Navigation Buttons -->
                <button id="btn" type="submit"><?php echo $currentQuestionIndex + 1 < count($questions) ? 'Next Question' : 'Finish Quiz'; ?></button>

            </form>
        </main>
    </section>


    <script>
    // Get all radio buttons
    const radioButtons = document.querySelectorAll('input[type="radio"]');

    // Add a change event listener to each radio button
    radioButtons.forEach(radio => {
        radio.addEventListener('change', (event) => {
            if (event.target.checked) {
                console.log(`Selected Response ID: ${event.target.value}`);
            }
        });
    });
</script>

</body>
</html>
