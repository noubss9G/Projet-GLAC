<?php
    /**
     * Dépendances 
    */
    require_once __DIR__."/../Classes/insertUtilisateur.class.php";
    require_once __DIR__."/../Classes/utilisateur.class.php";

    if(isset($_POST["btn-inscription"])){
        
        $prenom = filter_input(INPUT_POST,"txt-prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST,"txt-nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $courriel = strtolower(filter_input(INPUT_POST,"courriel-inscription", FILTER_VALIDATE_EMAIL));
        $mot_de_passe = filter_input(INPUT_POST,"motDePasse-inscription", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(!empty($prenom) && !empty($nom) && !empty($courriel) && !empty($mot_de_passe)){
            
            $interfaceUtilisateur = new InsertionUtilisateur($prenom, $nom, $courriel, password_hash($mot_de_passe, PASSWORD_DEFAULT));
            if($interfaceUtilisateur->Inserer()){
                header("Location: ../../connexion.php?session=inscriptionOK");
            }else{
                header("Location: ../../inscription.php?session=erreurInfo");
            }
            
        }else{
            header("Location: ../../inscription.php?session=ChampsVides");
        }
    }
?>