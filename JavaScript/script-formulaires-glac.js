// Redirection si l'utilisateur est déjà connecté
// document.addEventListener("DOMContentLoaded", function () {
//     const formulaireConnexion = document.getElementById("formulaire-connexion")

//     formulaireConnexion.addEventListener("submit", function (e) {
//         e.preventDefault()
//         // Valider les informations ici (ajoutez vos critères)
//         const courriel = document.getElementById("courriel").value
//         const motDePasse = document.getElementById("motDePasse").value

//         if (courriel && motDePasse) {
//             // Si les informations sont valides, redirection vers index.html
//             window.location.href = "index.html"
//         } else {
//             alert("Erreur avec votre courriel ou votre mot de passe !")
//         }
//     })

document.addEventListener("DOMContentLoaded", function () {

    // motif qui permet de vérifier que le mot de passe doit avoir une longueur minimum de 8 caractères et contenir 
    // au moins une lettre minuscule,
    // au moins une lettre majuscule,
    // au moins un chiffre 
    // et au moins un caractère spécial de cette liste : !@#$%^&*()_+{}\[\]:<>,.?~\\/- 
    let motif1 = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:<>,.?~\\/-]).{8,}/

    // motif qui permet de vérifier qu'il n'y a pas de caractère espace dans le mot de passe retouné
    let motif2 = /^\S*$/
    
    // On récupère les éléments du formulaire d'inscription à valider
    let form_inscription = document.getElementById("form-inscription")
    let mot_de_passe = document.getElementById("motDePasse-inscription")
    let confirmation_mot_de_passe_inscription = document.getElementById("confirmation-motDePasse-inscription")
    let liste_champs = form_inscription.querySelectorAll("input[type='text'], input[type='email']")

    // Vérification simultanée du mot de passe
    mot_de_passe.addEventListener("input", function () {
        if (motif1.test(mot_de_passe.value)) { // Vérifie si le mot de passe respecte les critères
        }else{
            if(motif2.test(mot_de_passe.value)){ // Vérifie si le mot de passe ne contient pas d'espace
                mot_de_passe.style.border = "solid 2px #06f5d5" // Change la couleur de la bordure en vert si la validation réussit
            }else{
            mot_de_passe.style.border = "solid 2px #fc8c8c" // Change la couleur de la bordure en rouge si la validation échoue
        }
    }
    })

    // Vérification simultanée de la conformité du mot de passe de confirmation
    confirmation_mot_de_passe_inscription.addEventListener("input", function () {
        if (mot_de_passe.value == confirmation_mot_de_passe_inscription.value) {
            confirmation_mot_de_passe_inscription.style.border = "solid 2px #06f5d5" // Change la couleur de la bordure en vert si la validation réussit
        } else {
            confirmation_mot_de_passe_inscription.style.border = "solid 2px #fc8c8c" // Change la couleur de la bordure en rouge si la validation échoue
        }
    })

    // Change la couleur de la bordure des champs de saisie en fonction de la validité de la saisie
    liste_champs.forEach(function (input) {
        input.addEventListener("input", function () {
            if (input.checkValidity()) {
                input.style.border = "solid 2px #06f5d5"
            } else {
                input.style.border = "solid 2px #fc8c8c"
            }
        })
    })

    // Validation finale lors de la soumission du formulaire
    form_inscription.addEventListener("submit", function (validation) {        
        if (!motif1.test(mot_de_passe.value) || !motif2.test(mot_de_passe.value)) {
            validation.preventDefault();
        }

        if (mot_de_passe.value !== confirmation_mot_de_passe_inscription.value) {
            validation.preventDefault();
        }
        // Si toutes les validations réussissent, le formulaire est soumis
    })
    
})