<?php 
    require_once '../Model/User.php';
    require_once '../Controller/UserController.php';

    $userController = new UserController();

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $experience = $_POST['experience'];
    $proof = $_POST['proof'];

    $user = new User($username, $email, $password, '', $age, $gender, '', $experience, '', $proof, "Expert", 'Pending');

    $userController->addUser($user);

    header('Location: dashboard.php');
    exit;
?>