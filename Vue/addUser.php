<?php 
    require_once '../Model/User.php';
    require_once '../Controller/UserController.php';

    $userController = new UserController();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $education_level = $_POST['education_level'];
    $gender = $_POST['gender'];
    $background = $_POST['it_background'];

    $user = new User($username, $email, $password, $background, $age, $gender, $education_level, '', '', '', "User", '', '');

    $userController->addUser($user);

    header('Location: dashboard.php');

    exit;
?>