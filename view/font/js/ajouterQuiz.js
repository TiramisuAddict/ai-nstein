document.addEventListener("DOMContentLoaded", () => {
    const form = document.querySelector("form.shadow");

    form.addEventListener("submit", (event) => {
        let isValid = true;

        // Réinitialiser les messages d'erreur
        document.querySelectorAll(".text-danger").forEach((error) => error.remove());

        // Validation du champ Titre
        const titre = document.getElementById("titre").value.trim();
        if (titre.length < 3) {
            isValid = false;
            const errorMessage = document.createElement("div");
            errorMessage.className = "text-danger mt-2";
            errorMessage.textContent = "Le titre doit contenir au moins 3 caractères.";
            document.getElementById("titre").parentElement.appendChild(errorMessage);
        }

        // Validation du champ Temps
        const time = parseInt(document.getElementById("time").value.trim(), 10);
        if (isNaN(time) || time <= 0) {
            isValid = false;
            const errorMessage = document.createElement("div");
            errorMessage.className = "text-danger mt-2";
            errorMessage.textContent = "Le temps doit être un nombre supérieur à 0.";
            document.getElementById("time").parentElement.appendChild(errorMessage);
        }

        // Validation des questions (au moins une doit être cochée)
        const questions = document.querySelectorAll("input[name='questions[]']:checked");
        if (questions.length === 0) {
            isValid = false;
            const errorMessage = document.createElement("div");
            errorMessage.className = "text-danger mt-2";
            errorMessage.textContent = "Veuillez sélectionner au moins une question.";
            document.querySelector("div.mb-3 div").appendChild(errorMessage);
        }

        // Si une validation échoue, empêcher l'envoi du formulaire
        if (!isValid) {
            event.preventDefault();
        }
    });
});
