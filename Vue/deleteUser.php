<?php
    require_once '../Controller/UserController.php';

    $userController = new UserController();

    $userId = $_GET['id'];

    $userController->deleteUser($userId);

    header('Location: dashboard.php');

    exit;
?>