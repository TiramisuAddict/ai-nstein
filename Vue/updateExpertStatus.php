<?php
    require_once '../Controller/UserController.php';
    $userController = new UserController();
    
    $userId = $_GET['id'];
    $expert = $userController->getUserById($userId);

    $status = $_GET['status'];
    
    $userController->setStatus($userId,$status);
    header('Location: expertRequestList.php');

?>