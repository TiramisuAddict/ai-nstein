<?php

require_once '../../controller/CoursC.php';
require_once '../../model/Cours.php';

// Activer les erreurs PHP
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

// Vérifier si les champs du formulaire sont remplis
if (
    isset($_POST["id_user"]) &&
    isset($_POST["nom_matiere"]) &&
    isset($_POST["date_pub"]) &&
    isset($_POST["type"]) &&
    isset($_FILES["fileToUpload"])
) {
    $target_dir = "../../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $uploadOk = true;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // Validation de l'image
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if ($check === false) {
        echo "Le fichier n'est pas une image.";
        $uploadOk = false;
    }

    // Vérification de la taille du fichier
    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "Désolé, votre fichier est trop volumineux.";
        $uploadOk = false;
    }

    // Autoriser uniquement certains formats
    $allowed_types = ["jpg", "png", "jpeg", "gif"];
    if (!in_array($imageFileType, $allowed_types)) {
        echo "Seuls les formats JPG, JPEG, PNG et GIF sont autorisés.";
        $uploadOk = false;
    }

    if ($uploadOk) {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            // Création d'un objet Cours
            $Cours = new Cours(
                0,
                $_POST['id_user'],
                $_POST['nom_matiere'],
                $_POST['date_pub'],
                $_POST['type'],
                $target_file
            );

            // Ajout du cours via le contrôleur
            $CoursC = new CoursC();
            if ($CoursC->addCours($Cours)) {
                header('Location: listcours.php');
                exit;
            } else {
                echo "Erreur lors de l'ajout du cours.";
            }
        } else {
            echo "Désolé, une erreur est survenue lors du téléchargement de votre fichier.";
        }
    } else {
        echo "L'image n'a pas pu être téléchargée.";
    }
} else {
    echo "Tous les champs sont requis.";
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter un Cours</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            margin: 0;
            padding: 0;
        }

        .container-fluid {
            max-width: 800px;
            margin: 50px auto;
            padding: 30px;
            background-color: white;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #4CAF50;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        .form-control:focus {
            border-color: #4CAF50;
            outline: none;
        }

        .text-danger {
            color: red;
            font-size: 0.9em;
        }

        .btn-primary {
            background-color: #007bff;
            border: none;
            padding: 10px 20px;
            color: white;
            cursor: pointer;
            font-size: 16px;
            border-radius: 4px;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .mb-4 {
            margin-bottom: 1.5rem;
        }

        .form-group {
            margin-bottom: 20px;
        }

        .small {
            font-size: 0.9em;
            color: #666;
        }
    </style>
    <script>
        function validateForm() {
            var id_user = document.getElementById("id_user").value;
            var nom_matiere = document.getElementById("nom_matiere").value;
            var date_pub = document.getElementById("date_pub").value;
            var type = document.getElementById("type").value;
            var fileToUpload = document.getElementById("fileToUpload").value;

            var isValid = true;

            // Validation des champs
            if (id_user === "") {
                document.getElementById("id_user_error").innerText = "Veuillez remplir ce champ.";
                isValid = false;
            } else {
                document.getElementById("id_user_error").innerText = "";
            }

            if (nom_matiere === "") {
                document.getElementById("nom_matiere_error").innerText = "Veuillez remplir ce champ.";
                isValid = false;
            } else if (nom_matiere.length < 3) {
                document.getElementById("nom_matiere_error").innerText = "Le nom de la matière doit contenir au moins 3 caractères.";
                isValid = false;
            } else {
                document.getElementById("nom_matiere_error").innerText = "";
            }

            if (date_pub === "") {
                document.getElementById("date_pub_error").innerText = "Veuillez choisir une date.";
                isValid = false;
            } else {
                var currentDate = new Date();
                var selectedDate = new Date(date_pub);
                if (selectedDate < currentDate) {
                    document.getElementById("date_pub_error").innerText = "La date de publication doit être ultérieure à la date actuelle.";
                    isValid = false;
                } else {
                    document.getElementById("date_pub_error").innerText = "";
                }
            }

            if (type === "") {
                document.getElementById("type_error").innerText = "Veuillez remplir ce champ.";
                isValid = false;
            } else {
                document.getElementById("type_error").innerText = "";
            }

            if (fileToUpload === "") {
                document.getElementById("fileToUpload_error").innerText = "Veuillez choisir un fichier.";
                isValid = false;
            } else {
                document.getElementById("fileToUpload_error").innerText = "";
            }

            return isValid;
        }
    </script>
</head>

<body>
    <div class="container-fluid">
        <h1>Ajouter un Cours</h1>
        <form action="" method="POST" enctype="multipart/form-data" onsubmit="return validateForm()">
            <div class="form-group">
                <label for="id_user" class="form-label">ID Utilisateur:</label>
                <input type="number" name="id_user" class="form-control" id="id_user" maxlength="50">
                <small id="id_user_error" class="text-danger"></small>
            </div>
            <div class="form-group">
                <label for="nom_matiere" class="form-label">Nom Matière:</label>
                <input type="text" name="nom_matiere" class="form-control" id="nom_matiere" maxlength="20">
                <small id="nom_matiere_error" class="text-danger"></small>
            </div>
            <div class="form-group">
                <label for="date_pub" class="form-label">Date de Publication:</label>
                <input type="date" name="date_pub" class="form-control" id="date_pub">
                <small id="date_pub_error" class="text-danger"></small>
            </div>
            <div class="form-group">
                <label for="type" class="form-label">Type:</label>
                <input type="text" name="type" class="form-control" id="type" maxlength="20">
                <small id="type_error" class="text-danger"></small>
            </div>
            <div class="form-group">
                <label for="fileToUpload" class="form-label">Upload Image:</label>
                <input class="form-control" type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
                <small id="fileToUpload_error" class="text-danger"></small>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Ajouter</button>
            </div>
        </form>
    </div>
</body>

</html>
