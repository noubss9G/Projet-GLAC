<?php

/**
 * Dépendances
 */
require_once __DIR__."/bd.connexion.class.php";


abstract class Select
{
    protected PDO $connexion;

    public function __construct()
    {
        $connexion = new Connexion();
        $this->connexion = $connexion->ObtenirConnexionLectureBD();
    }

    /**
     * Signature de la fonction de sélection d'un enregistrement.
     */
    abstract function select();

    /**
     * Signature de la fonction de sélection de plusieurs enregistrements.
     */
    abstract function selectMultiple(); 
}
?>