<?php
require_once '../Controller/exerciceController.php'; 
require_once '../Model/exercice.php'; 
if ($_SERVER['REQUEST_METHOD'] === 'POST') 
{
    $exercise = 
    [
        'title' => $_POST['title'],
        'description' => $_POST['description'],
        'difficulty_level' => $_POST['difficulty_level'],
        'author_name' => $_POST['author_name'],
        'project_file' => isset($_FILES['project_file']['tmp_name']) ? file_get_contents($_FILES['project_file']['tmp_name']) : null,
        'image' => isset($_FILES['image']['tmp_name']) ? file_get_contents($_FILES['image']['tmp_name']) : null,
    ];

    $exerciceController = new exerciceController();
    $exerciceController->addexercise($exercise);
    echo "Exercise added successfully!";
    header("Location: UpDel.php");
    exit;
}
?>