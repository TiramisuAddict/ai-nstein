<?php
require_once '../Config.php';
require_once '../Controller/depositController.php';
$depositController = new depositController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if this is an update or a new deposit
    $id_depot = isset($_POST['id_depot']) ? $_POST['id_depot'] : null;
    $exercise_id = isset($_POST['exercise_id']) ? $_POST['exercise_id'] : null;
    $uploadedFile = isset($_FILES['project_file']) ? $_FILES['project_file'] : null;

    if (!$uploadedFile || $uploadedFile['error'] !== UPLOAD_ERR_OK) {
        die("Error: File upload error. Please try again.");
    }
    $uploadDir = '/dashboard/exercises/Vue/uploads/';
    $physicalUploadDir = $_SERVER['DOCUMENT_ROOT'] . $uploadDir; 
    if (!is_dir($physicalUploadDir)) {
        mkdir($physicalUploadDir, 0777, true);
    }
    $fileName = time() . '_' . basename($uploadedFile['name']);
    $fileFullPath = $physicalUploadDir . $fileName; // Physical path for server storage
    $filePath = $uploadDir . $fileName; // URL-accessible path for the browser

    // Move the uploaded file to the uploads directory
    if (!move_uploaded_file($uploadedFile['tmp_name'], $fileFullPath)) {
        die("Error: Failed to save the uploaded file.");
    }

    if ($id_depot) {
        $depositController->updateDepositFile($id_depot, $filePath);
    } elseif ($exercise_id) {
        $deposit = [
            'exercise_id' => $exercise_id,
            'deposit_date' => date('Y-m-d'),
            'uploaded_file' => $filePath,
        ];
        $depositController->addDeposit($deposit);
    } else {
        die("Error: Invalid request. No valid ID provided.");
    }
    header("Location: show_dep.php");
    exit();
} else {
    die("Error: Invalid request method.");
}
