<?php
require_once '../../Controller/QuizController.php';
require_once '../../Controller/QuestionController.php';
require_once '../../Controller/ReponseController.php';
if (isset($_GET['idQuiz']) && $_GET['idQuiz'] != '') {
    $QuizController = new QuizController();
    $QuizController->DeleteQuiz($_GET['idQuiz']);
    header('Location:index.php');
    exit();
}
if (isset($_GET['idQues']) && $_GET['idQues'] != '') {
    $QuestionController = new QuestionController();
    $QuestionController->DeleteQuestion($_GET['idQues']);
    header('Location:index.php');
    exit(); 
}
if (isset($_GET['idRep']) && $_GET['idRep'] != '') {
    $ReponseController = new ReponseController();
    $ReponseController->DeleteReponse($_GET['idRep']);  
    header('Location:index.php');
    exit(); 
}
