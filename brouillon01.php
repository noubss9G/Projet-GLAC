<?php
    //à mettre tout en haut du fichier .php, cette fonction propre à PHP servira à maintenir la $_SESSION
    session_start();
    //si le bouton "Créer un compte" est cliqué

    $tableau_utilisateurs_authentifies = array(
        "Prenom" => array(),
        "Nom" => array(),
        "Courriel" => array(),
        "MotDePasse" => array(),
    );

    if(isset($_POST['btn-inscription'])){
        // tous les champs sont bien postés et pas vides, on sécurise les données entrées par l'utilisateur
        //le htmlentities() passera les guillemets en entités HTML, ce qui empêchera en partie, les injections SQL
        $Prenom = htmlentities($_POST['txt-prenom'], ENT_QUOTES, "UTF-8");
        $Nom = htmlentities($_POST['txt-nom'], ENT_QUOTES, "UTF-8");
        $Courriel = htmlentities($_POST['courriel-inscription'], ENT_QUOTES, "UTF-8");
        $MotDePasse = htmlentities($_POST['motDePasse-inscription'], ENT_QUOTES, "UTF-8");
        
        $tableau_utilisateurs_authentifies["Prenom"][] = $Prenom;
        $tableau_utilisateurs_authentifies["Nom"][] = $Nom;
        $tableau_utilisateurs_authentifies["Courriel"][] = $Courriel;
        $tableau_utilisateurs_authentifies["MotDePasse"][] = $MotDePasse;
        
        foreach ($tableau_utilisateurs_authentifies as $cle => $valeurs) {
            echo "Clé : $cle\n";
            foreach ($valeurs as $valeur) {
                echo " - $valeur\n";
            }
        }
        
        //on se connecte à la base de données:
        $mysqli = mysqli_connect("domaine.tld", "nom d'utilisateur", "mot de passe", "base de données");
        //on vérifie que la connexion s'effectue correctement:
        if(!$mysqli){
            echo "Erreur de connexion à la base de données.";
        } else {
            //on fait maintenant la requête dans la base de données pour rechercher si ces données existent et correspondent:
            //si vous avez enregistré le mot de passe en md5() il vous faudra faire la vérification en mettant mdp = '".md5($MotDePasse)."' au lieu de mdp = '".$MotDePasse."'
            $Requete = mysqli_query($mysqli,"SELECT * FROM membres WHERE pseudo = '".$Pseudo."' AND mdp = '".$MotDePasse."'");
            //si il y a un résultat, mysqli_num_rows() nous donnera alors 1
            //si mysqli_num_rows() retourne 0 c'est qu'il a trouvé aucun résultat
            if(mysqli_num_rows($Requete) == 0) {
                echo "Le pseudo ou le mot de passe est incorrect, le compte n'a pas été trouvé.";
            } else {
                //on ouvre la session avec $_SESSION:
                //la session peut être appelée différemment et son contenu aussi peut être autre chose que le pseudo
                $_SESSION['pseudo'] = $Pseudo;
                echo "Vous êtes à présent connecté !";
            }
        }
    }


    if(isset($_POST['btn-connexion'])){
        $Courriel = htmlentities($_POST['courriel-inscription'], ENT_QUOTES, "UTF-8");
        $MotDePasse = htmlentities($_POST['motDePasse-inscription'], ENT_QUOTES, "UTF-8");

        if (in_array($Courriel, $tableau_utilisateurs_authentifies) && in_array($MotDePasse, $tableau_utilisateurs_authentifies)) {
            echo "Bienvenue";
        } else {
            echo "Votre courriel ou votre mot de passe est incorrect.";
        }

    }
?>