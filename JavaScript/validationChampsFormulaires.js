// Script de validation des formulaires d'inscription et de connexion côté client
// Ce script utilise des expressions régulières et les pseudo-classes :valid et :invalid des balises HTML pour valider les champs de saisie

document.addEventListener("DOMContentLoaded", function () {

    // On récupère les éléments du formulaire de connexion à valider
    let form_connexion = document.getElementById("form-connexion")
    let courriel = document.getElementById("courriel-connexion")
    let motif_courriel = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+[\.][a-zA-Z]{2,3}$/

    form_connexion.addEventListener("input", function () {

        // Vérification simultanée du courriel
        courriel.addEventListener("input", function(){
            if(motif_courriel.test(courriel.value)){    // Vérifie si le courriel respecte le motif
                courriel.style.border = "solid 2px #06f5d5" // Change la couleur de la bordure en vert si la validation réussit
            }else{
               courriel.style.border = "solid 2px #fc8c8c" // Change la couleur de la bordure en rouge si la validation échoue
            }
        })
    })

    //Validation finale lors de la soumission du formulaire
    form_connexion.addEventListener("submit", function (validation) {  
        if(!motif_courriel.test(courriel.value)){
            validation.preventDefault();
        }
        //Si la validation réussit, le formulaire est soumis
    })
})

document.addEventListener("DOMContentLoaded", function () {

    // motif qui permet de vérifier que le mot de passe doit avoir une longueur minimum de 8 caractères et contenir 
    // au moins une lettre minuscule,
    // au moins une lettre majuscule,
    // au moins un chiffre 
    // et au moins un caractère spécial de cette liste : !@#$%^&*()_+{}\[\]:<>,.?~\\/- 
    let motif_mdp = /(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*()_+{}\[\]:<>,.?~\\/-]).{8,}/

    // motif qui permet de vérifier qu'il n'y a pas de caractère espace dans le mot de passe retouné
    let motif_espace = /^\S*$/

    let motif_courriel = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+[\.][a-zA-Z]{2,3}$/
    
    // On récupère les éléments du formulaire d'inscription à valider
    let form_inscription = document.getElementById("form-inscription")
    let courriel = document.getElementById("courriel-inscription")
    let mot_de_passe = document.getElementById("motDePasse-inscription")
    let confirmation_mot_de_passe_inscription = document.getElementById("confirmation-motDePasse-inscription")
    let liste_champs = form_inscription.querySelectorAll("input[type='text']") //, input[type='email']")

    // Vérification des champs de saisie de type 'text'
    liste_champs.forEach(function (input) {
        input.addEventListener("input", function () {
            if (input.checkValidity()) { // Vérifie si le champ de saisie est valide
                input.style.border = "solid 2px #06f5d5" // Change la couleur de la bordure en vert si la validation réussit
            } else {
                input.style.border = "solid 2px #fc8c8c" // Change la couleur de la bordure en rouge si la validation échoue
            }
        })
    })

    // Vérification simultanée du courriel
    courriel.addEventListener("input", function(){
        if(motif_courriel.test(courriel.value)){    // Vérifie si le courriel respecte le motif
            courriel.style.border = "solid 2px #06f5d5" // Change la couleur de la bordure en vert si la validation réussit
        }else{
           courriel.style.border = "solid 2px #fc8c8c" // Change la couleur de la bordure en rouge si la validation échoue
        }
    })

    // Vérification simultanée du mot de passe
    mot_de_passe.addEventListener("input", function () {
        if (motif_mdp.test(mot_de_passe.value)) { // Vérifie si le mot de passe respecte les critères
        }else{
            if(motif_espace.test(mot_de_passe.value)){ // Vérifie si le mot de passe ne contient pas d'espace
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

    //Validation finale lors de la soumission du formulaire
    form_inscription.addEventListener("submit", function (validation) {  
        if(!motif_courriel.test(courriel.value)){
            validation.preventDefault();
        }

        if (!motif_mdp.test(mot_de_passe.value) || !motif_espace.test(mot_de_passe.value)) {
            validation.preventDefault();
        }

        if (mot_de_passe.value !== confirmation_mot_de_passe_inscription.value) {
            validation.preventDefault();
        }
        //Si toutes les validations réussissent, le formulaire est soumis
    })
    
})

document.addEventListener("DOMContentLoaded", function () {

    // On récupère les éléments du formulaire de connexion à valider
    let form_echec_connexion = document.getElementById("form-probleme-connexion")
    let courriel = document.getElementById("courriel-echecConnexion")
    let motif_courriel = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+[\.][a-zA-Z]{2,3}$/

    form_echec_connexion.addEventListener("input", function () {

        // Vérification simultanée du courriel
        courriel.addEventListener("input", function(){
            if(motif_courriel.test(courriel.value)){    // Vérifie si le courriel respecte le motif
                courriel.style.border = "solid 2px #06f5d5" // Change la couleur de la bordure en vert si la validation réussit
            }else{
               courriel.style.border = "solid 2px #fc8c8c" // Change la couleur de la bordure en rouge si la validation échoue
            }
        })
    })

    //Validation finale lors de la soumission du formulaire
    form_echec_connexion.addEventListener("submit", function (validation) {  
        if(!motif_courriel.test(courriel.value)){
            validation.preventDefault();
        }
        //Si la validation réussit, le formulaire est soumis
    })
})