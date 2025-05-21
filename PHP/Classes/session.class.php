<?php

require_once __DIR__."/session.abstract.class.php";



class Session extends InitialisationSession

{
    /**
     * Initialise les paramètres de session.
     */
    public function __construct(int $duree_session)
    {        
        session_name("connexion");
        parent::__construct($duree_session);      
    }


    /**
     * Affecte les valeurs nécessaires à la validation de la session complète.
     */
    public function creerSession(string $identifiant_utilisateur,$nom_utilisateur,$prenom_utilisateur, string $ip_serveur)
    {
        $_SESSION["courriel"] = $identifiant_utilisateur;
        $_SESSION["nom_utilisateur"] = $nom_utilisateur;
        $_SESSION["prenom_utilisateur"] = $prenom_utilisateur;
        $_SESSION["ip"] = $ip_serveur;
        $_SESSION["date_debut"] = date("l").",".date("d/m/Y H:i:s");
        $_SESSION["time_start"] = time();
        // les clés date_debut et time_start sont assez similaires
        // mais pas identiques. La première est pour l'affichage et la seconde pour le calcul de la durée de session
    }


    /**
     * Récupère la session active et vérifie la validité avec les variables $_SESSSION
     * La variable $connected est définie à true lorsque l'utilisateur avait ouvert une session dans le fichier index.php 
     */
    public function validerSession(int $duree_session, bool $connected = false)
    {
        try 
        {
            if (session_status() == PHP_SESSION_ACTIVE){
                
                if (!isset($_SESSION["courriel"]) || !isset($_SESSION["ip"]) || !isset($_SESSION["date_debut"]) || !isset($_SESSION["time_start"]))
                {
                    $this->supprimer();
                    error_log("[".date("d/m/o H:i:s e",time())."] Accès direct refusé au requérant ".$_SERVER["REMOTE_ADDR"]."\n\r",3, "/home/noubissietchamab/logs/acces-refuses.log");
                    header("Location: /Projet-GLAC/connexion.php?session=sessionExpire");
                    exit();

                } elseif ((time() - $_SESSION["time_start"]) > $duree_session) {
                    
                    $this->supprimer();
                    error_log("[".date("d/m/o H:i:s e",time())."] Session expirée : Requérant ".$_SERVER["REMOTE_ADDR"]."Client authorisé: ".$_SESSION["courriel"]."\n\r" ,3,"/home/noubissietchamab/logs/acces-refuses.log");
                    
                    if($connected)
                    {
                        header("Location: /Projet-GLAC/index.php?session=sessionExpire");
                        exit();
                    } 
                    else 
                    {
                        header("Location: /Projet-GLAC/connexion.php?session=sessionExpire");
                        exit();
                    }
                }

            } else {
                echo "session inactive";
            }
        } catch (Exception $e) {
            error_log("Erreur sur la session: ".$e->getMessage());
        }
        
    }
    
    /**
     * Supprime la session active et antidate le cookie.
     */
    public function supprimer()
    {
        // Une session doit être active et ce doit être la même session que celle qui est à détruire

        if (session_status() == PHP_SESSION_ACTIVE){

            $parametresSession = session_get_cookie_params(); //Pour antidater (détruire) le cookie

            setcookie(
                session_name(), "", time()-60*60*24*30,
                $parametresSession["path"], $parametresSession["domain"],
                $parametresSession["secure"], $parametresSession["httponly"]
            );

            session_destroy(); //La session est effacée
            $_SESSION = array(); //La variable superglobale est supprimée
        }
    }
}


