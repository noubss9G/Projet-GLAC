<?php

require_once __DIR__."/select.abstract.class.php";
require_once __DIR__."/utilisateur.class.php";

class SelectUtilisateur extends Select
{
    protected string $courriel;
    protected string $mot_de_passe;
    protected string $nom;
    protected string $prenom;
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
            $requete = $this->connexion->prepare("select COUNT(*) from Utilisateur where courriel=:mail");
            
            $requete->bindValue(":mail",$this->courriel);
        
            $requete->execute();

            $compte = $requete->fetch();

            if($compte[0] == 1){

                $requete = $this->connexion->prepare("select * from Utilisateur where courriel=:mail");
    
                $requete->bindValue(":mail",$this->courriel);
            
                $requete->execute();
        
                $utilisateur = $requete->fetch(PDO::FETCH_OBJ);
    
                $this->utilisateur->DefinirId($utilisateur->id_utilisateur);
                $this->utilisateur->DefinirCourriel($utilisateur->courriel);
                $this->utilisateur->DefinirMdp($utilisateur->mot_de_passe);
                $this->utilisateur->DefinirNom($utilisateur->nom);
                $this->utilisateur->DefinirPrenom($utilisateur->prenom);
    
                return $this->utilisateur;
            }

    
        } catch (Exception $e) {
            // error_log("Exception pdo: ".$e->getMessage());
            error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormale - Exception PDO :".$e->getMessage()." - courriel invalide - Client : ".$_SERVER["REMOTE_ADDR"]."\n\r",3, __DIR__."/../../../logs/connexion.log");
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