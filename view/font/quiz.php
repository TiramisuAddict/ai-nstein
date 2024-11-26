<?php
require_once '../../Controller/QuestionController.php';
require_once '../../Controller/ReponseController.php';
require_once '../../Controller/QuizController.php';

// Récupérer l'identifiant du quiz depuis l'URL
if (!isset($_GET['id'])) {
    die("Quiz ID is missing!");
}
$quizId = intval($_GET['id']);

// Créer une instance de QuizController
$QuizController = new QuizController();

// Récupérer les informations du quiz depuis la base de données
$quiz = $QuizController->ListQuizById($quizId); // Assurez-vous que cette méthode existe dans votre QuizController
if (!$quiz) {
    die("Quiz not found!");
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Start Quiz</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <style>
        body {
            background-color: #f8f9fa;
        }

        .card {
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            border-radius: 10px;
        }

        .form-control {
            border-radius: 20px;
        }

        .btn-success {
            border-radius: 20px;
            padding: 10px 20px;
        }

        .btn-success:hover {
            background-color: #28a745;
            border-color: #28a745;
        }

        .text-center h1 {
            color: #343a40;
            font-family: 'Arial', sans-serif;
            font-weight: bold;
        }

        .quiz-details p {
            font-size: 16px;
            margin: 0;
            padding: 0;
        }

        .quiz-details strong {
            color: #17a2b8;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="text-center mb-4">
            <h1>Start Quiz: <?php echo htmlspecialchars($quiz['title']); ?></h1>
        </div>

        <div class="card mx-auto" style="max-width: 500px;">
            <div class="card-body">
                <!-- Quiz details -->
                <div class="quiz-details mb-4">
                    <p><strong>Time Limit:</strong> <?php echo htmlspecialchars($quiz['time']); ?> minutes</p>
                    <p><strong>Difficulty:</strong> <?php echo htmlspecialchars($quiz['difficulty']); ?></p>
                </div>

                <!-- Formulaire -->
                <form action="quiz_process.php" method="post">
                    <!-- Champ caché pour passer l'ID du quiz -->
                    <input type="hidden" name="quiz_id" value="<?php echo $quizId; ?>">

                    <!-- Nom de l'utilisateur -->
                    <div class="form-group mb-3">
                        <label for="username" class="form-label">Enter Your Name:</label>
                        <input type="text" name="username" id="username" class="form-control" placeholder="Your Name" required>
                    </div>

                    <!-- Bouton pour démarrer le quiz -->
                    <div class="text-center">
                        <button type="submit" class="btn btn-success">Start Quiz</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
