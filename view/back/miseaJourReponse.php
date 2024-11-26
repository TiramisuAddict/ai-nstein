<?php
require_once '../../Controller/ReponseController.php';
$ReponseController = new ReponseController();
$reponse = $ReponseController->ListReponseById($_GET['idRep']);
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $text = $_POST['text'];
    $reponse = new Reponse($text);
    $ReponseController->UpdateReponse($reponse, $_GET['idRep']);
    header('Location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ajouter Question et Reponse</title>
    <!-- Link to Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
    <div class="container mt-5">
        <div id="ajouterReponse">
            <h2 class="text-center">Mise à Jour la Réponse</h2>
            <form method="POST" class="shadow p-4 rounded border" id="updatereponse">
                <div class="mb-3">
                    <label for="reponseText" class="form-label">Mise à Jour du Contenu</label>
                    <textarea class="form-control" id="reponseText" name="text"
                        rows="4"><?= htmlspecialchars($reponse['text']); ?></textarea>
                </div>
                <button name="AjouterReponse" type="submit" class="btn btn-success w-100">Mettre à Jour la
                    Réponse</button>
            </form>
        </div>
    </div>
   
    <script>
    document.addEventListener("DOMContentLoaded", function () {
        console.log("Le script est chargé et prêt.");

        // Sélection des éléments du formulaire et du champ de texte
        const form = document.querySelector('#updatereponse'); 
        const reponseText = document.getElementById('reponseText'); 

        // Ajouter un écouteur sur la soumission du formulaire
        form.addEventListener('submit', function (event) {
            // Supprimer les messages d'erreur existants
            let existingError = document.querySelector('.error-message');
            if (existingError) {
                existingError.remove();
            }

            // Vérifier si le champ est vide ou ne contient pas deux mots
            if (reponseText.value.trim() === '' || !/(\s.*\s)/.test(reponseText.value)) {
                // Afficher une alerte et empêcher la soumission
                alert("Le champ 'reponseText' doit contenir au moins deux mots.");
                event.preventDefault(); // Empêcher la soumission

                // Ajouter un message d'erreur sous le champ
                const errorMessage = document.createElement('div');
                errorMessage.className = 'error-message text-danger mt-2';
                errorMessage.textContent = "Veuillez entrer un texte contenant au moins deux mots.";
                reponseText.parentElement.appendChild(errorMessage);

                // Ajouter une bordure rouge au champ
                reponseText.classList.add('is-invalid');
            } else {
                // Retirer les bordures rouges si le champ est valide
                reponseText.classList.remove('is-invalid');
                console.log("Le champ 'reponseText' est valide.");
            }
        });
    });
</script>

    <!-- Link to Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>