<?php

    /**
     * Dépendances
     */
    require_once __DIR__."/bd.connexion.class.php";


    abstract class Insertion
    {
        protected PDO $connexion;

        public function __construct()
        {
            $connexion = new Connexion();
            $this->connexion = $connexion->ObtenirConnexionEcritureBD();
        }

        /**
         * Signature de la fonction de sélection d'un enregistrement.
         */
        abstract function Inserer();
    }
?>