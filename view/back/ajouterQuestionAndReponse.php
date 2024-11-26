<?php
require_once '../../Controller/ReponseController.php';
require_once '../../Controller/QuestionController.php';
$ReponseController = new ReponseController();
$QuestionController = new QuestionController();
$reponses = $ReponseController->ListReponce();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['AjouterReponse'])) {
        $text = $_POST['text'];
        var_dump($text);
        $reponse = new Reponse($text);
        $ReponseController->AddReponse($reponse);
        header('Location:index.php');
    }
    if (isset($_POST['AjouterQuestion'])) {
        $text = $_POST['text'];
        $reponse = $_POST['reponse'];
        $question = new Question($text, -1, $reponse);
        $QuestionController->AddQuestion($question);
        header('Location:index.php');
    }
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
        <div id="AjouterQuestion" class="mb-4">
            <h2 class="text-center">Ajouter Question</h2>
            <form method="POST" class="shadow p-4 rounded border" id ="AjouterQuestion form">
                <div class="mb-3">
                    <label for="questionText" class="form-label">Inserter le Contenu</label>
                    <textarea class="form-control" id="questionText" name="text" rows="4"></textarea>
                </div>
                <div class="mb-3">
                    <label for="reponseSelect" class="form-label">Choisir un Reponse</label>
                    <select class="form-select" id="reponseSelect" name="reponse">
                        <?php
                        foreach ($reponses as $reponse) {
                            ?>
                            <option value="<?= $reponse['id']; ?>"><?= $reponse['text']; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                </div>
                <button name="AjouterQuestion" type="submit" class="btn btn-primary w-100">Ajouter Question</button>
            </form>
        </div>
        <div id="ajouterReponse">
            <h2 class="text-center">Ajouter Reponse</h2>
            <form method="POST" class="shadow p-4 rounded border" id="ajouterReponse form">
                <div class="mb-3">
                    <label for="reponseText" class="form-label">Inserter le Contenu</label>
                    <textarea class="form-control" id="reponseText" name="text" rows="4"></textarea>
                </div>
                <button name="AjouterReponse" type="submit" class="btn btn-success w-100">Ajouter Reponse</button>
            </form>
        </div>
    </div>

    <!-- Link to Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../font/js/ajouterQuestionAndReponse.js"></script>
</body>

</html>