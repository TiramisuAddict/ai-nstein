<?php 
    require_once '../Model/User.php';
    require_once '../Controller/UserController.php';

    $userController = new UserController();

    $username = $_POST['username'];
    $email = $_POST['email'];

    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $experience = $_POST['experience'];

    // Upload proof document

    $filename_portrait = $_FILES['portrait']['name'];
    $filetmpname_portrait = $_FILES['portrait']['tmp_name'];

    $target_dir_portrait = "../Vue/uploads/profile_pictures/";
    $target_file_portrait = $target_dir_portrait . basename($filename_portrait);

    move_uploaded_file($filetmpname_portrait, $target_file_portrait);

    // Upload proof document

    $filename = $_FILES['proof']['name'];
    $filetmpname = $_FILES['proof']['tmp_name'];

    $target_dir = "../Vue/uploads/proof_docs/";
    $target_file = $target_dir . basename($filename);

    move_uploaded_file($filetmpname, $target_file);

    $user = new User($username, $email, $password, '', $age, $gender, '', $experience, 'Expert', 'Pending', $target_file_portrait, $target_file);

    $userController->addUser($user);

    header('Location: dashboard.php');
    exit;
?>