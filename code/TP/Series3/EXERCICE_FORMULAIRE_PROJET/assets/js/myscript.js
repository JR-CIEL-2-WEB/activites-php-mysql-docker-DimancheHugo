function verifierFormulaire(event) {
    // Récupération des éléments avec la classe 'form-control'
    var inputs = document.querySelectorAll('.form-control');
    var checkbox = document.querySelector('#formCheck-1');
    var checkboxErrorMsg = checkbox.nextElementSibling.nextElementSibling; // Message d'erreur sous la case à cocher
    var valid = true;

    // Fonction pour afficher ou masquer les messages d'erreur
    function showError(input, message) {
        input.classList.remove("is-valid");
        input.classList.add("is-invalid");
        input.nextElementSibling.textContent = message;
        input.nextElementSibling.style.display = "block"; // Affiche le message
    }

    function hideError(input) {
        input.classList.remove("is-invalid");
        input.classList.add("is-valid");
        input.nextElementSibling.style.display = "none"; // Masque le message
    }

    // Validation de chaque champ
    inputs.forEach(function(input) {
        // Validation du champ nom
        if (input.name === "name") {
            if (input.value === "") {
                showError(input, "Veuillez entrer votre nom");
                valid = false;
            } else {
                hideError(input);
            }
        }

        // Validation du champ prénom
        if (input.name === "prénom") {
            if (input.value === "") {
                showError(input, "Veuillez entrer votre prénom");
                valid = false;
            } else {
                hideError(input);
            }
        }

        // Validation de l'email
        if (input.name === "email") {
            if (input.value === "") {
                showError(input, "Veuillez entrer votre email");
                valid = false;
            } else if (input.value.indexOf("@") === -1) { // Vérifie la présence du symbole @
                showError(input, "Veuillez entrer un email valide contenant un '@'");
                valid = false;
            } else {
                hideError(input);
            }
        }

        // Validation du mot de passe
        if (input.name === "password") {
            if (input.value.length < 8) {
                showError(input, "Veuillez entrer un mot de passe de 8 caractères minimum");
                valid = false;
            } else {
                hideError(input);
            }
        }
    });

    // Vérification de la case "I am of age"
    if (!checkbox.checked) {
        checkboxErrorMsg.style.display = "block"; // Affiche le message
        valid = false;
    } else {
        checkboxErrorMsg.style.display = "none"; // Masque le message si coché
    }
    // Empêche l'envoi si des champs sont invalides
    if (!valid) {
        event.preventDefault(); // Empêche l'envoi du formulaire si l'email existe déjà ou s'il y a d'autres erreurs
    }
}
