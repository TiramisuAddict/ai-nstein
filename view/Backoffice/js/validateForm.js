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

    // Fichier facultatif dans le cas de la mise à jour
    if (fileToUpload !== "") {
        var fileSize = document.getElementById("fileToUpload").files[0].size;
        if (fileSize > 500000) { // Taille maximale : 500 KB
            document.getElementById("fileToUpload_error").innerText = "Le fichier est trop volumineux.";
            isValid = false;
        } else {
            document.getElementById("fileToUpload_error").innerText = "";
        }
    }

    return isValid;
}
