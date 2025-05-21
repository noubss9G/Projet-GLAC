<?php
    /**
     * Dépendances 
    */
    require_once __DIR__."/../Classes/insertUtilisateur.class.php";
    require_once __DIR__."/../Classes/selectUtilisateur.class.php";
    require_once __DIR__."/../Classes/utilisateur.class.php";

    if(isset($_POST["btn-inscription"])){
        
        $prenom = filter_input(INPUT_POST,"txt-prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $nom = filter_input(INPUT_POST,"txt-nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
        $courriel = strtolower(filter_input(INPUT_POST,"courriel-inscription", FILTER_VALIDATE_EMAIL));
        $mot_de_passe = filter_input(INPUT_POST,"motDePasse-inscription", FILTER_SANITIZE_FULL_SPECIAL_CHARS);

        if(!empty($prenom) && !empty($nom) && !empty($courriel) && !empty($mot_de_passe)){
            
            // Vérification de l'existence du courriel dans la BD
            $interfaceUtilisateur = new SelectUtilisateur($courriel);
            if ($utilisateur = $interfaceUtilisateur->select()){
                error_log("[".date("d/m/o H:i:s e",time())."] Inscription échouée - courriel déjà existant - utilisateur : ".$courriel." ".$_SERVER["REMOTE_ADDR"]."\n\r",3, "/home/noubissietchamab/logs/insertion-bd-echoue.log");
                header("Location: ../../inscription.php?session=courrielExistant");    
            }else{
                $interfaceUtilisateur = new InsertionUtilisateur($prenom, $nom, $courriel, password_hash($mot_de_passe, PASSWORD_DEFAULT));
                if($interfaceUtilisateur->Inserer()){
                    error_log("[".date("d/m/o H:i:s e",time())."] Inscription réussie - utilisateur : ".$courriel." ".$_SERVER["REMOTE_ADDR"]."\n\r",3, "/home/noubissietchamab/logs/insertion-bd.log");
                    header("Location: ../../connexion.php?session=inscriptionOK");
                }else{
                header("Location: ../../inscription.php?session=erreurInfo");
                }
            }
        }else{
            error_log("[".date("d/m/o H:i:s e",time())."] Inscription échouée - utilisateur : ".$courriel." ".$_SERVER["REMOTE_ADDR"]."\n\r",3, "/home/noubissietchamab/logs/insertion-bd-echoue.log");
            header("Location: ../../inscription.php?session=ChampsVides");
        }
    }
?>