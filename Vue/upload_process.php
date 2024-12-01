<?php
require_once '../Config.php';
require_once '../Model/Depot.php';
$pdo = config::getConnexion();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['exercise_id']) && isset($_FILES['project_file'])) {
    $exercise_id = $_POST['exercise_id'];
    $stmt = $pdo->prepare("SELECT * FROM exercises WHERE id = :exercise_id");
    $stmt->execute(['exercise_id' => $exercise_id]);
    $exercise = $stmt->fetch();
    if (!$exercise) {
        die("Error: Exercise not found.");
    }
    $uploadedFile = $_FILES['project_file'];
    if ($uploadedFile['error'] === UPLOAD_ERR_OK) {
        $uploadDir = __DIR__ . '/uploads/';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        $filePath = $uploadDir . basename($uploadedFile['name']);
        if (move_uploaded_file($uploadedFile['tmp_name'], $filePath)) {
            $depot = new Depot($exercise_id, date('Y-m-d'), $filePath);
            $stmt = $pdo->prepare("INSERT INTO depot (exercise_id, deposit_date , uploaded_file) VALUES (:exercise_id, :deposit_date, :uploaded_file)");
            $stmt->execute([
                'exercise_id' => $depot->getExerciseId(),
                'deposit_date' => $depot->getDepositDate(),
                'uploaded_file' => $depot->getUploadedFile()
            ]);

            header("Location: exercices.php");
            exit();
        } else {
            die("Error: Failed to move the uploaded file.");
        }
    } else {
        die("Error: File upload error.");
    }
} else {
    die("Invalid request.");
}
