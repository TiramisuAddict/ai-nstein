document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form.shadow");

    form.addEventListener("submit", (event) => {
        let isValid = true;

        // Réinitialiser les messages d'erreur
        document.querySelectorAll(".text-danger").forEach((error) => error.remove());

        // Validation du champ Texte de la question
        const questionText = document.getElementById("questionText").value.trim();
        if (questionText.length < 3) {
            isValid = false;
            const errorMessage = document.createElement("div");
            errorMessage.className = "text-danger mt-2";
            errorMessage.textContent = "Le texte de la question doit contenir au moins 3 caractères.";
            document.getElementById("questionText").parentElement.appendChild(errorMessage);
        }

        // Validation de la sélection de la réponse
        const reponseSelect = document.getElementById("reponseSelect").value;
        if (!reponseSelect) {
            isValid = false;
            const errorMessage = document.createElement("div");
            errorMessage.className = "text-danger mt-2";
            errorMessage.textContent = "Veuillez sélectionner une réponse.";
            document.getElementById("reponseSelect").parentElement.appendChild(errorMessage);
        }

        // Si une validation échoue, empêcher l'envoi du formulaire
        if (!isValid) {
            event.preventDefault();
        }
    });
});
