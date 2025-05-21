<?php
    require_once __DIR__."/../Classes/session.class.php";

    $session = new Session(60*10);  // La durée de la session est de 10 minutes
    session_start();
    $session->validerSession(60*10); // Vérifier la validité de la session
    if(isset($_POST["btn-validerCode"]))
    {
        if(!($codeSaisi = filter_input(INPUT_POST,"code", FILTER_VALIDATE_INT)))
        {
            header("Location: ../../page_double_authentification.php?session=erreurNombre");
        }else
        {
            if ($codeSaisi == $_SESSION["code"])
            {
                // Je stocke les identifiants de l'utilisateur qui ont servi dans la session de double authentification
                $courriel = $_SESSION["courriel"];
                $nom_utilisateur = $_SESSION["nom_utilisateur"];
                $prenom_utilisateur = $_SESSION["prenom_utilisateur"];

                // Je détruit la session de double authentification
                $session->supprimer();

                // Je crèe une nouvelle session de 30 minutes pour la navigation sur le site
                $session = new Session(60*30);
                session_start();
                $session->creerSession($courriel,$nom_utilisateur,$prenom_utilisateur,$_SERVER["REMOTE_ADDR"]);
                $_SESSION["nom_session"] = "session_utilisateur_connecte";
                error_log("[".date("d/m/o H:i:s e",time())."] Accès réussi - utilisateur : ".$_SESSION["courriel"]." ".$_SERVER["REMOTE_ADDR"]."\n\r",3, "/home/noubissietchamab/logs/acces-reussis.log");
                header("Location: ../../index.php?session=utilisateurAuthentifie");
                exit();
            }
            else
            {
                error_log("[".date("d/m/o H:i:s e",time())."] Échec double authentification - code de double authentification erroné - utilisateur : ".$_SESSION["courriel"]." ".$_SESSION["prenom_utilisateur"]." ".$_SESSION["nom_utilisateur"].$_SERVER["REMOTE_ADDR"]."\n\r",3,"/home/noubissietchamab/logs/acces-refuses.log");
                header("Location: ../../page_double_authentification.php?session=erreurCode");
                exit();
            }
        }
    }
            
    if(isset($_POST["btn-nouveauCode"]))
    {
        require_once __DIR__."/courriel.authentification.php";

        if (mail($destinataire, $objet, $message, $en_tete)) 
        {
            header("Location: ../../page_double_authentification.php");
            exit();
        }
        else 
        {
            error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormale - une erreur est survenue dans l'envoi du code pour la double authentification par courriel - Client :  ".$_SESSION["courriel"]." ".$_SERVER["REMOTE_ADDR"]."\n\r",3, "/home/noubissietchamab/logs/acces-refuses.log");
            header("Location: ../../connexion.php?session=erreurEnvoiCode");
            exit();
        }
    } 

    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';
    // echo $codeSaisi;
?>