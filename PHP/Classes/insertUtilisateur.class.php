<?php
    /**
     * Dépendances 
    */
    require_once __DIR__."/insert.abstract.class.php";

    class InsertionUtilisateur extends Insertion
    {
        protected string $prenom;
        protected string $nom;
        protected string $courriel;
        protected string $mot_de_passe;

        public function __construct(string $prenom, string $nom, string $courriel, string $mot_de_passe)
        {
            $this->prenom = $prenom;
            $this->nom = $nom;
            $this->courriel = $courriel;
            $this->mot_de_passe = $mot_de_passe;
            parent::__construct(); 
        }
        
        /**
         * Insertion d'un utilisateur
         */
        public function Inserer()
        {
            try {

                $requete = $this->connexion->prepare("INSERT INTO Utilisateur(prenom, nom, courriel,
                mot_de_passe) VALUE(:prenom, :nom, :courriel, :mot_de_passe)");
                
                $requete->bindValue(":prenom", $this->prenom);
                $requete->bindvalue(":nom", $this->nom);
                $requete->bindValue(":courriel", $this->courriel);
                $requete->bindValue(":mot_de_passe", $this->mot_de_passe);

                return $requete->execute();
                
            } catch (Exception $e) {
                error_log("[".date("d/m/o H:i:s e",time())."] Authentification anormale - Exception PDO :".$e->getMessage()." - courriel invalide - Client : ".$_SERVER["REMOTE_ADDR"]."\n\r",3, __DIR__."/../../../logs/connexion.log");
            }        
        }
    }
?>