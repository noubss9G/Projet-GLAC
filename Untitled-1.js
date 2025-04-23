// Fonction pour vérifier la conformité de l'adresse e-mail
function validerEmail(email) {
    const regexEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
    return regexEmail.test(email);
}

// Fonction pour vérifier la conformité du mot de passe
function validerMotDePasse(motDePasse) {
    // Critères de base : au moins 8 caractères, une majuscule, une minuscule, un chiffre et un caractère spécial
    const regexMotDePasse = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/;
    return regexMotDePasse.test(motDePasse);
}

// Exemple d'utilisation
const email = "exemple@domaine.com";
const motDePasse = "Exemple123!";

if (validerEmail(email)) {
    console.log("L'adresse e-mail est valide.");
} else {
    console.log("L'adresse e-mail n'est pas valide.");
}

if (validerMotDePasse(motDePasse)) {
    console.log("Le mot de passe est conforme.");
} else {
    console.log("Le mot de passe n'est pas conforme.");
}

document.addEventListener("DOMContentLoaded", function () {
    let motif1 = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:;<>,.?~\\/-]).{8,}/;
    let motif2 = /^\S*$/;

    let form_inscription = document.getElementById("form-inscription");
    let mot_de_passe = document.getElementById("motDePasse-inscription");
    let confirmation_motDePasse_inscription = document.getElementById("confirmation-motDePasse-inscription");

    // Vérification en temps réel du mot de passe
    mot_de_passe.addEventListener("input", function () {
        if (!motif1.test(mot_de_passe.value)) {
            mot_de_passe.style.border = "solid #fc8c8c";
        } else if (!motif2.test(mot_de_passe.value)) {
            mot_de_passe.style.border = "solid #fc8c8c";
        } else {
            mot_de_passe.style.border = "solid green";
        }
    });

    // Vérification en temps réel du mot de passe de confirmation
    confirmation_motDePasse_inscription.addEventListener("input", function () {
        if (mot_de_passe.value !== confirmation_motDePasse_inscription.value) {
            confirmation_motDePasse_inscription.style.border = "solid #fc8c8c";
        } else {
            confirmation_motDePasse_inscription.style.border = "solid green";
        }
    });

    // Vérification en temps réel des autres champs (texte et email)
    let liste_inputs = form_inscription.querySelectorAll("input[type='text'], input[type='email']");
    liste_inputs.forEach(function (input) {
        input.addEventListener("input", function () {
            if (input.checkValidity()) {
                input.style.border = "solid green";
            } else {
                input.style.border = "solid #fc8c8c";
            }
        });
    });

    // Validation finale lors de la soumission du formulaire
    form_inscription.addEventListener("submit", function (validation) {
        if (!motif1.test(mot_de_passe.value) || !motif2.test(mot_de_passe.value)) {
            validation.preventDefault();
            mot_de_passe.style.border = "solid #fc8c8c";
            alert("Le mot de passe doit respecter les critères de sécurité.");
        }

        if (mot_de_passe.value !== confirmation_motDePasse_inscription.value) {
            validation.preventDefault();
            confirmation_motDePasse_inscription.style.border = "solid #fc8c8c";
            alert("Le mot de passe de confirmation ne correspond pas au mot de passe.");
        }
    });
});