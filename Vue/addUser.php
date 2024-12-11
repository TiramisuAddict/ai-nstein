<?php 
    require_once '../Model/User.php';
    require_once '../Controller/UserController.php';

    $userController = new UserController();

    $username = $_POST['username'];
    $email = $_POST['email'];

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $age = $_POST['age'];
    $education_level = $_POST['education_level'];
    $gender = $_POST['gender'];
    $background = $_POST['it_background'];

    $filename = $_FILES['profile_picture']['name'];
    $filetmpname = $_FILES['profile_picture']['tmp_name'];

    $target_dir = "../Vue/uploads/profile_pictures/";
    $target_file = $target_dir . basename($filename);

    move_uploaded_file($filetmpname, $target_file);
    
    $user = new User($username, $email, $password, $background, $age, $gender, $education_level, '', 'User', '', $target_file, '');
    $userController->addUser($user);

    header('Location: dashboard.php');

    exit;
?>