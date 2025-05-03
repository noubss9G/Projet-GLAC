<?php

require_once __DIR__."/select.abstract.class.php";
require_once __DIR__."/utilisateur.class.php";

class SelectUtilisateur extends Select
{
    protected string $courriel;
    protected string $mot_de_passe;
    protected Utilisateur $utilisateur;

    public function __construct(string $courriel)
    {
        $this->courriel = $courriel;
        $this->utilisateur = new Utilisateur();
        parent::__construct(); 
    }
    

    
    /**
     * Sélection d'un utilisateur selon le courriel
     */
    public function select()
    {
        try {
            $requete = $this->connexion->prepare("select * from Utilisateur where courriel=:mail");
    
            $requete->bindValue(":mail",$this->courriel);
        
            $requete->execute();
    
            $utilisateur = $requete->fetch(PDO::FETCH_OBJ);

            $this->utilisateur->DefinirId($utilisateur->id_utilisateur);
            $this->utilisateur->DefinirCourriel($utilisateur->courriel);
            $this->utilisateur->DefinirMdp($utilisateur->mot_de_passe);

            return $this->utilisateur;
    
        } catch (Exception $e) {
            error_log("Exception pdo: ".$e->getMessage());
        }        
    }



    /**
     * Sélection de plusieurs utilisateurs
     */

     public function selectMultiple()
     {
        null;
     }
}


