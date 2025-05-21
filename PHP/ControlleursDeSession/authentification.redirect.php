<?php
    /**
     * Dépendances 
    */
    require_once __DIR__."/../Classes/session.class.php";
    require_once __DIR__."/../Classes/selectUtilisateur.class.php";
    require_once __DIR__."/../Classes/utilisateur.class.php";
    

    if (!empty($_POST["courriel-connexion"]) and !empty($_POST["motDePasse-connexion"])){

        $courriel = strtolower(filter_input(INPUT_POST,"courriel-connexion", FILTER_VALIDATE_EMAIL));
        $mot_de_passe = filter_input(INPUT_POST,"motDePasse-connexion", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        /**
         * Requête sur la BD avec le courriel
         */
        
        $interfaceUtilisateur = new SelectUtilisateur($courriel);
        if (!($utilisateur = $interfaceUtilisateur->select())){
            header("Location: ../../connexion.php?session=erreurCourriel");
        }
        
        // Vérification de la compatibilité du mot de passe de l'utilisateur selectionné avec le mot de passe enregistré dans la bd
        if (password_verify($mot_de_passe, $utilisateur->ObtenirMdp())){

            // OK je peux faire la session
            $session = new Session(60*10);  // La durée de la session est de 10 minutes
            session_start();
            $session->creerSession($courriel, $utilisateur->ObtenirNom(), $utilisateur->ObtenirPrenom(), $_SERVER["REMOTE_ADDR"]);
            $_SESSION["nom_session"] = "session_authentification";

            // Envoi du courriel de double authentification
            require_once __DIR__."/courriel.authentification.php";

            if (mail($destinataire, $objet, $message, $en_tete)) {
                header("Location: ../../page_double_authentification.php");
            } else {
                error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormale - une erreur est survenue dans l'envoi du code pour la double authentification par courriel - Client :  ".$_SERVER["REMOTE_ADDR"]."\n\r",3, __DIR__."/../../../logs/connexion.log");
                header("Location: ../../connexion.php?session=erreurEnvoiCode");
            }

        }else {
            header("Location: ../../connexion.php?session=erreurMDP");
        }

    }else {
        error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormale - courriel ou mot de passe absent - Client : ".$_SERVER["REMOTE_ADDR"]."\n\r",3, __DIR__."/../../../logs/connexion.log");
        header("Location: ../../connexion.php?session=ChampsVides");
    }
?>