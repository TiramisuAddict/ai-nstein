document.addEventListener("DOMContentLoaded", function () {
    const form = document.getElementById('updateQuiz'); // Sélectionner le formulaire
    form.addEventListener('submit', function (event) {
        let isValid = true;
        const errors = [];
        
        // Supprimer les anciens messages d'erreur
        document.querySelectorAll('.text-danger').forEach(function (error) {
            error.remove();
        });

        // Validation du Titre
        const titre = document.getElementById('titre').value.trim();
        if (titre.length < 3) {
            isValid = false;
            errors.push("Le titre doit contenir au moins 3 caractères.");
            const errorMessage = document.createElement('div');
            errorMessage.className = 'text-danger mt-2';
            errorMessage.textContent = "Le titre doit contenir au moins 3 caractères.";
            document.getElementById('titre').parentElement.appendChild(errorMessage);
        }

        // Validation du Temps
        const time = document.getElementById('time').value.trim();
        const timeRegex = /^[1-9][0-9]?[SMH]$/i; // Le temps doit être entre 1 et 60 suivi de S, M ou H
        if (!timeRegex.test(time)) {
            isValid = false;
            errors.push("Le temps doit être un nombre entre 1 et 60 suivi de S, M ou H (ex : 30M).");
            const errorMessage = document.createElement('div');
            errorMessage.className = 'text-danger mt-2';
            errorMessage.textContent = "Le temps doit être un nombre entre 1 et 60 suivi de S, M ou H (ex : 30M).";
            document.getElementById('time').parentElement.appendChild(errorMessage);
        }

        // Validation de la Difficulté
        const difficulty = document.getElementById('difficulty').value.trim();
        if (!["facile", "moyenne", "difficile"].includes(difficulty)) {
            isValid = false;
            errors.push("Veuillez sélectionner une difficulté valide.");
            const errorMessage = document.createElement('div');
            errorMessage.className = 'text-danger mt-2';
            errorMessage.textContent = "Veuillez sélectionner une difficulté valide.";
            document.getElementById('difficulty').parentElement.appendChild(errorMessage);
        }

        // Validation des Questions (au moins une doit être sélectionnée)
        const questions = document.querySelectorAll('input[name="questions[]"]:checked');
        if (questions.length === 0) {
            isValid = false;
            errors.push("Veuillez sélectionner au moins une question.");
            const errorMessage = document.createElement('div');
            errorMessage.className = 'text-danger mt-2';
            errorMessage.textContent = "Veuillez sélectionner au moins une question.";
            document.getElementById('questions').parentElement.appendChild(errorMessage);
        }

        // Si des erreurs sont présentes, on empêche l'envoi et on affiche un message d'erreur
        if (!isValid) {
            event.preventDefault(); // Empêche l'envoi du formulaire
            alert("Veuillez corriger les erreurs suivantes :\n" + errors.join("\n"));
        }
    });
});
