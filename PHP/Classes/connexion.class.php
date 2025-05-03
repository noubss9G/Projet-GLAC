<?php

require_once __DIR__."/../ConfigBD/config.bd.lecture.include.php";

class Connexion
{
    /** Retourne une connexion avec le driver Mariabd sur la bd. */
    function ObtenirConnexionBD()
    {
        try {
            $chaineConnexion = "mysql:dbname=".BDSCHEMA.";host=".BDSERVEUR;

            return new PDO($chaineConnexion,BDUTILISATEUR,BDMDP);

        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }
    }
}
