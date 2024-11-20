<?php

include '../../controller/CoursC.php';
$coursC = new CoursC();

// Vérifier si l'ID est passé dans l'URL
if (isset($_GET["id"])) {
    $id = $_GET["id"];
    // Récupérer le cours
    $tab = $coursC->affichercours($id);

    // Vérifier si un cours a été trouvé avec cet ID
    if (count($tab) > 0) {
        $cours = $tab[0]; // Récupérer le premier élément
    } else {
        echo "Cours non trouvé.";
        exit();
    }
} else {
    echo "ID manquant dans l'URL.";
    exit();
}

if (isset($_POST["update"])) {
    // Mise à jour des données du cours
    $new_id_user = $_POST["id_user"];
    $new_nom_matiere = $_POST["nom_matiere"];
    $new_date_pub = $_POST["date_pub"];
    $new_type = $_POST["type"];
    
    // Appel à la méthode updatecours pour mettre à jour
    $coursC->updatecours($id, $new_nom_matiere, $new_date_pub, $new_type);
    header("Location: listcours.php"); // Redirection après mise à jour
    exit();
}

?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier Cours</title>

    <style>
        /* Style global */
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f9fc;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 70%; /* Réduit la largeur du formulaire */
            max-width: 600px; /* Limite la largeur maximale */
            margin: 50px auto;
            padding: 15px; /* Réduit les espacements internes */
            background-color: #fff;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        h1 {
            color: #2c3e50;
            text-align: center;
            font-size: 1.5em; /* Réduit la taille du titre */
            margin-bottom: 20px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        td {
            padding: 8px; /* Réduit l'espacement dans les cellules */
            text-align: left;
        }

        label {
            font-weight: bold;
            color: #34495e;
            font-size: 0.95em; /* Réduit légèrement la taille des labels */
        }

        input[type="text"], input[type="number"], input[type="date"] {
            width: 100%;
            padding: 8px; /* Réduit le padding des champs */
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
            font-size: 0.95em; /* Réduit la taille du texte dans les champs */
        }

        input[type="submit"] {
            background-color: #5cb85c;
            color: white;
            padding: 8px 16px; /* Réduit le padding du bouton */
            border: none;
            border-radius: 5px;
            cursor: pointer;
            margin-top: 15px; /* Réduit l'espacement avant le bouton */
            font-size: 1em; /* Réduit la taille du texte du bouton */
        }

        input[type="submit"]:hover {
            background-color: #4cae4c;
        }

        .back-button {
            display: inline-block;
            background-color: #e74c3c;
            color: white;
            padding: 8px 12px; /* Réduit le padding du bouton retour */
            border-radius: 5px;
            text-decoration: none;
            font-size: 1em; /* Réduit la taille du texte */
        }

        .back-button:hover {
            background-color: #c0392b;
        }

        button {
            background-color: #3498db;
            color: white;
            padding: 8px 12px; /* Réduit le padding */
            border-radius: 5px;
            cursor: pointer;
            text-align: center;
            display: block;
            margin: 10px auto;
        }

        button a {
            color: white;
            text-decoration: none;
        }

        button:hover {
            background-color: #2980b9;
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
    <button><a href="listcours.php">Retour à la liste</a></button>
    <hr>

    <form action="" method="POST">
        <table border="1" align="center">
            <tr>
                <td><label for="id_user">ID Utilisateur:</label></td>
                <td><input type="number" name="id_user" id="id_user" value="<?php echo $cours['id_user']; ?>" maxlength="20"></td>
            </tr>
            <tr>
                <td><label for="nom_matiere">Nom Matière:</label></td>
                <td><input type="text" name="nom_matiere" id="nom_matiere" value="<?php echo $cours['nom_matiere']; ?>" maxlength="50"></td>
            </tr>
            <tr>
                <td><label for="date_pub">Date de Publication:</label></td>
                <td><input type="text" name="date_pub" id="date_pub" value="<?php echo $cours['date_pub']; ?>"></td>
            </tr>
            <tr>
                <td><label for="type">Type:</label></td>
                <td><input type="text" name="type" id="type" value="<?php echo $cours['type']; ?>"></td>
            </tr>
            <tr>
            <td><label for="fileToUpload">Image:</label></td>
            <td>
                <input type="file" name="fileToUpload" id="fileToUpload" accept="image/*">
                <br>
                <?php if (!empty($cours['image'])): ?>
                    <img src="<?php echo $cours['image']; ?>" alt="Image actuelle" style="max-width: 100px; margin-top: 10px;">
                <?php endif; ?>
            </td>
        </tr>
            <tr>
                <td></td>
                <td><input type="submit" name="update" value="Mettre à jour"></td>
            </tr>
        </table>
    </form>

</body>
</html>
