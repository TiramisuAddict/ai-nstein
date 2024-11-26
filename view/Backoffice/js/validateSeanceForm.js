function validateSeanceForm() {
    var id_matiereseance = document.getElementById("id_matiereseance").value;
    var date_seance = document.getElementById("date_seance").value;
    var heure_d = document.getElementById("heure_d").value;
    var heure_f = document.getElementById("heure_f").value;
    var description = document.getElementById("description").value;

    // Suppression des messages d'erreur précédents
    document.getElementById("id_matiereseance_error").innerText = "";
    document.getElementById("date_seance_error").innerText = "";
    document.getElementById("heure_d_error").innerText = "";
    document.getElementById("heure_f_error").innerText = "";
    document.getElementById("description_error").innerText = "";

    // Vérification de la saisie des champs obligatoires
    var isValid = true;

    if (id_matiereseance === "") {
        document.getElementById("id_matiereseance_error").innerText = "Veuillez sélectionner une matière.";
        isValid = false;
    }

    if (date_seance === "") {
        document.getElementById("date_seance_error").innerText = "Veuillez choisir une date de séance.";
        isValid = false;
    } else {
        var currentDate = new Date();
        var selectedDate = new Date(date_seance);

        if (selectedDate < currentDate) {
            document.getElementById("date_seance_error").innerText = "La date de la séance doit être ultérieure à la date actuelle.";
            isValid = false;
        }
    }

    if (heure_d === "") {
        document.getElementById("heure_d_error").innerText = "Veuillez entrer l'heure de début.";
        isValid = false;
    }

    if (heure_f === "") {
        document.getElementById("heure_f_error").innerText = "Veuillez entrer l'heure de fin.";
        isValid = false;
    }

    if (description === "") {
        document.getElementById("description_error").innerText = "Veuillez entrer une description.";
        isValid = false;
    } else if (description.length < 2) {
        document.getElementById("description_error").innerText = "La description doit contenir au moins 3 caractères.";
        isValid = false;
    }

    return isValid;
}
