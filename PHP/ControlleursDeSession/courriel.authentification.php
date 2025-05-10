<?php
    $session = new Session(60*10);  // La durée de la session est de 10 minutes
    session_start();
    
    $destinataire = $_SESSION["courriel"];
    
    $code = rand(100000,999999);
    
    $_SESSION['code'] = $code;

    $message = "Votre code est : ".$code."\r\n"."Veuillez le saisir dans le champ de vérification de la page de double authentififcation.";
    
    $en_tete = 
    "From: noubissietchamab@techinfo420.ca" . "\r\n" .
    "X-Mailer: PHP/" . phpversion();

    $objet = "Code de vérification pour double authentification";

?>