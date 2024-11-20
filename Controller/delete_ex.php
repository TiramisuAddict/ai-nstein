<?php
require_once '../Controller/exerciceController.php'; 

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id']; 
    $exerciceController = new ExerciceController();
    $exerciceController->deleteExercise($id); 
    header("Location: ../vue/UpDel.php"); 
    exit; 
}
?>
