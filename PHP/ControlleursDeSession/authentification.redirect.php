<?php
 /**
  * Dépendances 
  */
require_once __DIR__."/../Classes/sessionConnexion.class.php";
require_once __DIR__."/../Classes/selectUtilisateur.class.php";
require_once __DIR__."/../Classes/utilisateur.class.php";


if (!empty($_POST["courriel-connexion"]) and !empty($_POST["motDePasse-connexion"])){

    $courriel = filter_input(INPUT_POST,"courriel-connexion", FILTER_VALIDATE_EMAIL);
    $mot_de_passe = hash("sha512", filter_input(INPUT_POST,"motDePasse-connexion", FILTER_SANITIZE_FULL_SPECIAL_CHARS));

    /**
     * Requête sur la bd avec le courriel
     */
    $interfaceUtilisateur = new SelectUtilisateur($courriel); //courriel reçu de la requête http
    $utilisateur = $interfaceUtilisateur->select();

    if (password_verify($mot_de_passe, $utilisateur->ObtenirMdp())){
        //OK je peux faire la session

        $session = new SessionConnexion();
        session_start();
        $session->creerSession($courriel, $_SERVER["REMOTE_ADDR"]);

        header("Location: ../../index.html");
    }else {
        // echo $mot_de_passe."\n\r";
        // echo $utilisateur->ObtenirMdp();
        //Mauvais mot de passe, rediriger
        header("Location: ../../connexion.php?session=erreurMDP");
    }

}else {
    error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormale - mail ou mot de passe absent: Client ".$_SERVER["REMOTE_ADDR"]."\n\r",3, __DIR__."/../../../logs/connexion.log");
    header("Location: ../../connexion.php?session=erreurChampsVides");
}


