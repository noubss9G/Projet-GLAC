<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
         /**
         * Dépendances 
        */
        // require_once __DIR__."/../Classes/sessionConnexion.class.php";
        // require_once __DIR__."/../Classes/selectUtilisateur.class.php";
        // require_once __DIR__."/../Classes/utilisateur.class.php";


        $bddPDO = new PDO("mysql:host=127.0.0.1;dbname=noubissietchamab_Projet_GLAC","noubissietchamab_glac_ecrire","Glac_Ecrire25");
        
        $bddPDO->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

        if(isset($_POST["btn-inscription"])){
            
            $prenom = filter_input(INPUT_POST,"txt-prenom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $nom = filter_input(INPUT_POST,"txt-nom", FILTER_SANITIZE_FULL_SPECIAL_CHARS);
            $courriel = filter_input(INPUT_POST,"courriel-inscription", FILTER_VALIDATE_EMAIL);
            $mot_de_passe = hash("sha512", filter_input(INPUT_POST,"motDePasse-inscription", FILTER_SANITIZE_FULL_SPECIAL_CHARS));

            if(!empty($prenom) && !empty($nom) && !empty($courriel) && !empty($mot_de_passe)){
                
                $requete = $bddPDO->prepare("INSERT INTO Utilisateur(prenom, nom, courriel,
                mot_de_passe) VALUE(:prenom, :nom, :courriel, :mot_de_passe)");
                
                $requete->bindValue(":prenom", $prenom);
                $requete->bindvalue(":nom",$nom);
                $requete->bindValue(":courriel", $courriel);
                $requete->bindValue(":mot_de_passe", $mot_de_passe);

                $resultat = $requete->execute();

                if(!$resultat){
                    header("Location: ../../connexion.php?session=erreurEnregistrement");
                }else{
                    header("Location: ../../connexion.php");
                }
            }else{
                header("Location: ../../connexion.php?session=erreurChampsVides");
            }
        }
    ?>
</body>
</html>