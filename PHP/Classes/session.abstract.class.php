<?php
    abstract class InitialisationSession
    {
        /**
         * Initialise les paramètres de session.
         */
        public function __construct(int $duree_session)
        {
            require_once __DIR__."/../ConfigBD/config.bd.ecriture.include.php";
            
            // Désactivation de l'affichage des erreurs PHP à l'écran
            // ini_set('display_errors', 0);
            // ini_set('log_errors', 1);
            // error_reporting(E_ALL);
            
            // ini_set("session.save_path", "/home/noubissietchamab/sessions/Projet-GLAC/");
            ini_set("session.cookie_lifetime", $duree_session); // Durée de la session en secondes
            ini_set("session.use_cookies", 1);
            ini_set("session.use_only_cookies" , 1);
            ini_set("session.use_strict_mode", 1);
            ini_set("session.cookie_httponly", 1);
            ini_set("session.cookie_secure", 1);// 0 pour docker local. 1 en production sur techninfo420.
            ini_set("session.cookie_samesite" , "Strict");
            ini_set("session.cache_limiter" , "nocache");
            ini_set("session.hash_function" , "sha512");

        }


        /**
         * Affecte les valeurs nécessaires à la validation de la session selon l'étape de la session.
         */
        public abstract function creerSession(string $identifiant_utilisateur,$nom_utilisateur,$prenom_utilisateur, string $ip_serveur);


        /**
         * Récupère la session active et vérifie la validité avec les variables $_SESSSION
         */
        public abstract function validerSession(int $duree_session);



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
?>