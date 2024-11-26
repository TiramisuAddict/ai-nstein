<?php
require_once '../../Controller/QuizController.php';
require_once '../../Controller/QuestionController.php';

$QuizController = new QuizController();
$QuestionController = new QuestionController();

// Fetch the specific quiz by ID
$quiz = $QuizController->ListQuizById($_GET['idQuiz']);
$questions = $QuestionController->ListQuestion();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $title = $_POST['titre'];
    $time = $_POST['time'];
    $difficulty = $_POST['difficulty'];
    $updated_questions = isset($_POST['questions']) ? $_POST['questions'] : [];
    if (isset($_POST['questions'])) {
        $questions = $_POST['questions'];
    }
    $quiz = new Quiz($title, $time, $difficulty);
    $QuizController->UpdateQuiz($quiz, $_GET['idQuiz'], $updated_questions);

    // Redirect after update
    header('Location: index.php');
}
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mise à jour du Quiz</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div id="UpdateQuiz" class="mb-4">
            <h2 class="text-center">Mise à jour du Quiz</h2>
            <form method="POST" class="shadow p-4 rounded border" id="updateQuiz">
                <div class="mb-3">
                    <label for="titre" class="form-label">Mise à jour du Titre</label>
                    <!-- Pre-fill the title with the current value -->
                    <input type="text" class="form-control" id="titre" name="titre" value="<?= htmlspecialchars($quiz['title']); ?>" required />
                </div>
                <div class="mb-3">
                    <label for="time" class="form-label">Mise à jour du Temps</label>
                    <!-- Pre-fill the time with the current value -->
                    <input type="number" class="form-control" id="time" name="time" value="<?= htmlspecialchars($quiz['time']); ?>" required />
                </div>
                <div class="mb-3">
                    <label for="difficulty" class="form-label">Mise à jour de la Difficulté</label>
                    <select class="form-select" id="difficulty" name="difficulty" required>
                        <option value="facile" <?= $quiz['difficulty'] == 'facile' ? 'selected' : ''; ?>>Facile</option>
                        <option value="moyenne" <?= $quiz['difficulty'] == 'moyenne' ? 'selected' : ''; ?>>Moyenne</option>
                        <option value="difficile" <?= $quiz['difficulty'] == 'difficile' ? 'selected' : ''; ?>>Difficile</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label for="questions" class="form-label">Mise à jour des Questions</label>
                    <div>
                        <?php
                        foreach ($questions as $question) {
                        ?>
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" id="question_<?= $question['id']; ?>"
                                    name="questions[]" value="<?= $question['id']; ?>">
                                <label class="form-check-label" for="question_<?= $question['id']; ?>">
                                    <?= htmlspecialchars($question['text']); ?>
                                </label>
                            </div>
                        <?php
                        }
                        ?>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary w-100">Mettre à jour le Quiz</button>
            </form>
        </div>
    </div>


<script>
    document.addEventListener("DOMContentLoaded", function () {
        const form = document.getElementById('updateQuiz');
        const titre = document.getElementById('titre');
        const time = document.getElementById('time');
        const difficulty = document.getElementById('difficulty');
        const questions = document.querySelectorAll('input[name="questions[]"]');

        form.addEventListener('submit', function (event) {
            // Supprimez les anciens messages d'erreur
            document.querySelectorAll('.error-message').forEach(el => el.remove());

            let isValid = true;

            // Validation du titre
            if (titre.value.trim().length < 3) {
                isValid = false;
                displayError(titre, "Le titre doit contenir au moins 3 caractères.");
            }

            // Validation du temps
            if (time.value <= 0 || isNaN(time.value)) {
                isValid = false;
                displayError(time, "Le temps doit être un nombre entier positif.");
            }

            // Validation de la difficulté
            if (!difficulty.value) {
                isValid = false;
                displayError(difficulty, "Veuillez sélectionner une difficulté.");
            }

            // Validation des questions
            const anyChecked = Array.from(questions).some(q => q.checked);
            if (!anyChecked) {
                isValid = false;
                const questionContainer = document.querySelector('.form-check');
                displayError(questionContainer, "Veuillez sélectionner au moins une question.");
            }

            // Si une validation échoue, empêchez la soumission
            if (!isValid) {
                event.preventDefault();
            }
        });

        // Fonction pour afficher un message d'erreur
        function displayError(element, message) {
            const errorMessage = document.createElement('div');
            errorMessage.className = 'error-message text-danger mt-2';
            errorMessage.textContent = message;

            // Ajouter le message d'erreur après l'élément
            element.parentElement.appendChild(errorMessage);

            // Ajouter une bordure rouge à l'élément
            element.classList.add('is-invalid');
        }
    });
</script>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>