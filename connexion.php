<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GLAC - Connexion</title>
        <link rel="stylesheet" href="CSS/style-formulaires-glac.css" type="text/css">
        <script src="JavaScript/validationChampsFormulaires.js"></script>
    </head>
    <body>
        <!-- Fond semi-transparent -->
        <div class="div-superposition-form">
            <!-- Page du formulaire -->
            <div class="div-form">

                <?php
                    if (isset($_GET["session"])) {
                        if ($_GET["session"] == "inscriptionOK") {
                            echo "<p style=\"color: green\">Inscription réussie ! Vous pouvez à présent vous connecter.</p>";
                        } elseif ($_GET["session"] == "ChampsVides") {
                            echo "<p style=\"color: red\">Tous les champs sont requis.</p>";
                        }elseif($_GET["session"] == "erreurMDP"){
                            echo "<p style=\"color: red\">Le mot de passe entré ne correspond pas à l'identifiant.</p>";
                        }elseif($_GET["session"] == "erreurEnvoiCode"){
                            echo "<p style=\"color: red\">Désolé, une erreur est survenue avec le processus de double authentification. Veuillez essayer de vous connecter à nouveau.</p>";
                        }elseif($_GET["session"] == "erreurCourriel"){
                            echo "<p style=\"color: red\">Courriel invalide, cet utilisateur n'est pas encore inscrit.</p>";
                        }elseif($_GET["session"] == "sessionExpire"){
                            echo "<p style=\"color: red\">Votre session a expiré, veuillez vous reconnecter.</p>";
                        }
                    }
                ?>

                <img src="Images/Logo_GLAC.png" alt="Logo_GLAC" class="logo-glac">
                <h1 class="signification-acronyme">Gestionnaire Libre d'Associations et de Coopératives</h1>
                <h2>Bon retour parmi nous&nbsp;!</h2>
                <form id="form-connexion" name="form-connexion" method="post" action="PHP/ControlleursDeSession/authentification.redirect.php">
                    <legend><abbr title="Champ obligatoire">*</abbr></legend>
                    <input type="email" id="courriel-connexion" name="courriel-connexion" aria-describedby="aideCourriel-connexion" placeholder="*Entrez votre courriel..." maxlength="150" required>
                    <input type="password" id="motDePasse-connexion" name="motDePasse-connexion" placeholder="*Mot de passe" maxlength="100" required>
                    <div>
                        <input type="checkbox" id="checkboxSouvenir" name="checkboxSouvenir">
                        <label for="checkboxSouvenir">Se souvenir de moi</label>
                    </div>
                    <button type="submit" name="btn-connexion" onclick="AppliquerStyleValidation()">Se connecter</button>
                </form>
                <hr>
                <a href="probleme_connexion.php" class="liens-formulaires">Mot de passe oublié&nbsp;?</a>
                <a href="inscription.php" class="liens-formulaires">Vous n"avez pas de compte&nbsp;? Créez-en un&nbsp;!</a>
            </div>
        </div>
    </body>
</html>