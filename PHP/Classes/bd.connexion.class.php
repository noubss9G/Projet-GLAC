<?php

require_once __DIR__."/../ConfigBD/config.bd.lecture.include.php";
require_once __DIR__."/../ConfigBD/config.bd.ecriture.include.php";

class Connexion
{
    /** Retourne une connexion avec le driver Mariabd sur la bd. */
    function ObtenirConnexionLectureBD()
    {
        try {
            $chaineConnexion = "mysql:dbname=".LECTURE_BDSCHEMA.";host=".LECTURE_BDSERVEUR;

            return new PDO($chaineConnexion,LECTURE_BDUTILISATEUR,LECTURE_BDMDP);

        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }
    }

    function ObtenirConnexionEcritureBD(){
        try {
            $chaineConnexion = "mysql:dbname=".ECRITURE_BDSCHEMA.";host=".ECRITURE_BDSERVEUR;

            return new PDO($chaineConnexion,ECRITURE_BDUTILISATEUR,ECRITURE_BDMDP);

        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }
    }
}
