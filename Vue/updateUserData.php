<?php
    require_once '../Controller/UserController.php';
    $userController = new UserController();
    
    $userId = $_GET['id'];
    $user = $userController->getUserById($userId);

    if($user["role"] == "User"){

        $newUser = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'itbackground' => $_POST['it_background'],
            'age' => $_POST['age'],
            'sexe' => $_POST['gender'],
            'educationlvl' => $_POST['education_level']
        ];

        $userController->updateUser($userId,$newUser);
    } else{
        $newExpert = [
            'username' => $_POST['username'],
            'email' => $_POST['email'],
            'age' => $_POST['age'],
            'sexe' => $_POST['gender'],
            'experience' => $_POST['experience']
        ];

        $userController->updateExpert($userId,$newExpert);
    }

    header('Location: dashboard.php');
?>