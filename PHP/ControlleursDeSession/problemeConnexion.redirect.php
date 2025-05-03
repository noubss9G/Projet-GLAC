<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Traitement de mot de passe oublié</title>
    </head>
    <body>
        <?php
            $courriel = filter_input(INPUT_POST, "courriel-echecConnexion", FILTER_SANITIZE_EMAIL);
            $code = rand(100000, 999999); // Générer un code aléatoire à 6 chiffres

            session_start(); // Démarrer la session pour stocker le code
            $_SESSION["courriel"] = $courriel; // Stocker le courriel dans la session
            $_SESSION["code"] = $code;

            if (envoyerCourriel($courriel, "Votre code de récupération est : ".$code)) {
                echo "<p>Message envoyé à ". $courriel."</p>";
            } else {
                echo "<p>Message non envoyé à ". $courriel."</p>";
            }

            function envoyerCourriel($courriel, $message) {
                $objet = "Code de vérification";
                $en_tete = 
                "From: noubissietchamab@techinfo420.ca" . "\r\n" .
                "X-Mailer: PHP/" . phpversion();

                return mail($courriel, $objet, $message, $en_tete);    
            }
        ?>
    </body>
</html>