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