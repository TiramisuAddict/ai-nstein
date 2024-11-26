<?php
require_once '../../Controller/QuizController.php';
require_once '../../Controller/QuestionController.php';
$QuestionController = new QuestionController();
$questions = $QuestionController->ListQuestion();
$QuizController = new QuizController();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['titre'];
    $time = $_POST['time'];
    $difficulty = $_POST['difficulty'];
    if (isset($_POST['questions'])) {
        $questions = $_POST['questions'];
    }
    $quiz = new Quiz($title, $time, $difficulty);
    $QuizController->AddQuiz($quiz, $questions);
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Question et Reponse</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div id="AjouterQuiz" class="mb-4">
            <h2 class="text-center">Ajouter Quiz</h2>
            <form method="POST" class="shadow p-4 rounded border">
                <div class="mb-3">
                    <label for="titre" class="form-label">Inserter le Titre</label>
                    <input type="text" class="form-control" id="titre" name="titre" required />
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Inserter le temps</label>
                    <input type="number" class="form-control" id="time" name="time" required />
                </div>
                <div class="mb-3">
                    <label for="difficulty" class="form-label">Difficulté</label>
                    <select class="form-select" id="difficulty" name="difficulty" required>
                        <option value="facile">Facile</option>
                        <option value="moyenne">Moyenne</option>
                        <option value="difficile">Difficile</option>
                    </select>
                </div>
                <div class="mb-3">
                    <label for="questions" class="form-label">Questions</label>
                    <div>
                        <?php
                        foreach ($questions as $question) {
                            ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="question_<?= $question['id']; ?>"
                                    name="questions[]" value="<?= $question['id']; ?>" checked>
                                <label class="form-check-label" for="question_<?= $question['id']; ?>">
                                    <?= htmlspecialchars($question['text']); ?>
                                </label>
                            </div>
                            <?php
                        }
                        ?>
                    </div>
                </div>

                <button name="AjouterQuestion" type="submit" class="btn btn-primary w-100">Ajouter Question</button>
            </form>

        </div>
        <!-- Link to Bootstrap JS and dependencies -->
         <script src = "../font/js/ajouterQuiz.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>