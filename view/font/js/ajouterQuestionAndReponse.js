document.addEventListener("DOMContentLoaded", () => {
    // Sélection des formulaires
    const questionForm = document.querySelector("#AjouterQuestion form");
    const reponseForm = document.querySelector("#ajouterReponse form");

    // Validation pour le formulaire d'ajout de question
    if (questionForm) {
        questionForm.addEventListener("submit", (event) => {
            const questionText = document.getElementById("questionText").value.trim();
            const questionError = document.getElementById("questionTextError");

            // Supprimer les erreurs précédentes
            if (questionError) {
                questionError.remove();
            }

            // Vérification : le champ ne doit pas être vide et doit contenir au moins 3 caractères
            if (questionText.length < 3) {
                event.preventDefault(); // Empêche l'envoi du formulaire
                const errorMessage = document.createElement("div");
                errorMessage.id = "questionTextError";
                errorMessage.className = "text-danger mt-2";
                errorMessage.textContent = "Le champ de la question doit contenir au moins 3 caractères.";
                document.getElementById("questionText").parentElement.appendChild(errorMessage);
            }
        });
    }

    // Validation pour le formulaire d'ajout de réponse
    if (reponseForm) {
        reponseForm.addEventListener("submit", (event) => {
            const reponseText = document.getElementById("reponseText").value.trim();
            const reponseError = document.getElementById("reponseTextError");

            // Supprimer les erreurs précédentes
            if (reponseError) {
                reponseError.remove();
            }

            // Vérification : le champ ne doit pas être vide et doit contenir au moins 3 caractères
            if (reponseText.length < 3) {
                event.preventDefault(); // Empêche l'envoi du formulaire
                const errorMessage = document.createElement("div");
                errorMessage.id = "reponseTextError";
                errorMessage.className = "text-danger mt-2";
                errorMessage.textContent = "Le champ de la réponse doit contenir au moins 3 caractères.";
                document.getElementById("reponseText").parentElement.appendChild(errorMessage);
            }
        });
    }
});
