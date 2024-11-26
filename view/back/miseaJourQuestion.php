<?php
require_once '../../Controller/ReponseController.php';
require_once '../../Controller/QuestionController.php';

$ReponseController = new ReponseController();
$QuestionController = new QuestionController();

// Fetch the specific question and its responses
$question = $QuestionController->ListQuestionById($_GET['idQues']);
$reponses = $ReponseController->ListReponce();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = $_POST['text'];
    $reponse_id = $_POST['reponse'];
    
    // Update the question with the new text and associated response
    $question = new Question($text, -1, $reponse_id);
    $QuestionController->UpdateQuestion($question, $_GET['idQues']);
    
    // Redirect to the index page after updating
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mettre à jour Question</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div id="UpdateQuestion" class="mb-4">
            <h2 class="text-center">Mise à jour de la Question</h2>
            <form method="POST" class="shadow p-4 rounded border">
                <div class="mb-3">
                    <label for="questionText" class="form-label">Mise à jour du Texte de la Question</label>
                    <textarea class="form-control" id="questionText" name="text" rows="4"><?= htmlspecialchars($question['text']); ?></textarea>
                </div>
                <div class="mb-3">
                    <label for="reponseSelect" class="form-label">Sélectionner la Réponse</label>
                    <select class="form-select" id="reponseSelect" name="reponse">
                        <?php foreach ($reponses as $reponse) { ?>
                            <option value="<?= $reponse['id']; ?>" <?= $reponse['id'] == $question['reponse_id'] ? 'selected' : ''; ?>>
                                <?= $reponse['text']; ?>
                            </option>
                        <?php } ?>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary w-100">Mettre à jour Question</button>
            </form>
        </div>
    </div>
    <script src = "../font/js/miseaJourQuestion.js"></script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
