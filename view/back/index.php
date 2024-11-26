<?php
require_once '../../Controller/QuizController.php';
require_once '../../Controller/QuestionController.php';
require_once '../../Controller/ReponseController.php';
$ReponseController = new ReponseController();
$QuestionController = new QuestionController();
$QuizController = new QuizController();
$quizzes = $QuizController->ListQuiz();
$responses = $ReponseController->ListReponce();
$questions  = $QuestionController->ListQuestion();
?>
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste de Quiz, Questions et Réponses</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>

    <div class="container mt-5">
        <!-- Section: Quiz -->
        <h2 class="text-center">Liste des Quiz</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Difficulté</th>
                    <th>Temps</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($quizzes as $quiz) { ?>
                    <tr>
                        <td><?= $quiz['id']; ?></td>
                        <td><?= $quiz['title']; ?></td>
                        <td><?= $quiz['difficulty']; ?></td>
                        <td><?= $quiz['time']; ?> minutes</td>
                        <td>
                            <a href="miseaJourQuiz.php?idQuiz=<?= $quiz['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer.php?idQuiz=<?= $quiz['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer ce quiz?')">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="ajouterQuiz.php" class="btn btn-primary btn-sm">Ajouter un Quiz</a>

        <!-- Section: Questions -->
        <h2 class="text-center">Liste des Questions</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Texte de la Question</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($questions as $question) { ?>
                    <tr>
                        <td><?= $question['id']; ?></td>
                        <td><?= $question['text']; ?></td>
                        <td>
                            <a href="miseaJourQuestion.php?idQues=<?= $question['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer.php?idQues=<?= $question['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette question?')">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <!-- Section: Réponses -->
        <h2 class="text-center">Liste des Réponses</h2>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Texte de la Réponse</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($responses as $response) { ?>
                    <tr>
                        <td><?= $response['id']; ?></td>
                        <td><?= $response['text']; ?></td>
                        <td>
                            <a href="miseaJourReponse.php?idRep=<?= $response['id']; ?>" class="btn btn-warning btn-sm">Modifier</a>
                            <a href="supprimer.php?idRep=<?= $response['id']; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Êtes-vous sûr de vouloir supprimer cette réponse?')">Supprimer</a>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>

        <a href="ajouterQuestionAndReponse.php" class="btn btn-primary btn-sm">Ajouter Question et Réponse</a>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>

</body>

</html>
