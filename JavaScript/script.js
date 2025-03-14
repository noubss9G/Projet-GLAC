// Redirection si l'utilisateur est déjà connecté
document.addEventListener("DOMContentLoaded", function () {
    const formulaireConnexion = document.getElementById("formulaire-connexion");

    formulaireConnexion.addEventListener("submit", function (e) {
        e.preventDefault();
        // Valider les informations ici (ajoutez vos critères)
        const courriel = document.getElementById("courriel").value;
        const motDePasse = document.getElementById("motDePasse").value;

        if (courriel && motDePasse) {
            // Si les informations sont valides, redirection vers index.html
            window.location.href = "index.html";
        } else {
            alert("Erreur avec votre courriel ou votre mot de passe !");
        }
    });
});
