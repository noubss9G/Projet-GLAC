<?php
// require_once __DIR__."/PHP/Classes/session.class.php";
// $session = new Session(60*10);  // La durée de la session est de 10 minutes
// session_start();
// echo '<pre>';
// print_r($_SESSION);
// echo '</pre>';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GLAC - Double Authentification</title>
        <link rel="stylesheet" href="CSS/style-formulaires-glac.css" type="text/css">
    </head>
    <body>
        <!-- Fond semi-transparent -->
        <div class="div-superposition-form">
            <!-- Page du formulaire -->
            <div class="div-form">

                <?php
                    // Affichage des messages d'erreur
                    if (isset($_GET["session"])) {
                        if ($_GET["session"] == "ChampsVides") {
                            echo "<p style=\"color: red\">Veuillez saisir le code envoyé à votre adresse courriel&nbsp;!</p>";
                        }elseif($_GET["session"] == "erreurCode"){
                            echo "<p style=\"color: red\">Le code saisi n'est pas correct, veuillez réessayer&nbsp;!</p>";
                        }elseif($_GET["session"] == "erreurNombre"){
                            echo "<p style=\"color: red\">Le code saisi doit être un nombre à 6 chiffres&nbsp;!</p>";
                        }
                    }
                ?>

                <img src="Images/Logo_GLAC.png" alt="Logo_GLAC" class="logo-glac">
                <h1 class="signification-acronyme">Gestionnaire Libre d'Associations et de Coopératives</h1>
                <h3>Veuillez saisir le code envoyé à votre adresse courriel&nbsp;!</h3>

                <form id="form-doubleAuthentification" name="form-doubleAuthentification" method="post" action="PHP/ControlleursDeSession/double.authentification.redirect.php">
                    <fieldset id="fieldset-form-double-authentification">
                        <legend><abbr title="Champ obligatoire">Code de vérification à 6 chiffres*</abbr></legend>
                        <input type="text" name="code" id="code" maxlength="6">
                    </fieldset>
                    <button type="submit" name="btn-nouveauCode" id="btn-nouveauCode">Recevoir un nouveau code</button>
                    <button type="submit" name="btn-validerCode" id="btn-validerCode">Valider</button>
                </form>

                <hr>

            </div>
        </div>
    </body>
</html>