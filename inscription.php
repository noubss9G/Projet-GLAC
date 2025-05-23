<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GLAC - Inscription</title>
        <link rel="stylesheet" href="CSS/style-formulaires-glac.css" type="text/css">
        <script src="JavaScript/validationChampsFormulaires.js"></script>
    </head>
    <body>
        <!-- Fond semi-transparent -->
        <div class="div-superposition-form">
            <!-- Page du formulaire -->
            <div class="div-form">
                <?php
                    if(isset($_GET["session"])){
                        if ($_GET["session"] == "erreurInfo") {
                            echo "<p style=\"color: red\">Une erreur est survenue lors de votre enregistrement. Veuillez rééssayer</p>";
                        } elseif ($_GET["session"] == "ChampsVides") {
                            echo "<p style=\"color: red\">Tous les champs sont requis.</p>";
                        }elseif ($_GET["session"] == "courrielExistant") {
                            echo "<p style=\"color: red\">Un utilisateur avec ce courriel existe déjà. Veuillez-vous connecter ou procéder à l'inscription d'un nouvel utilisateur.</p>";
                        } 
                    }
                ?>
                <img src="Images/Logo_GLAC.png" alt="Logo_GLAC" class="logo-glac">
                <h1 class="signification-acronyme">Gestionnaire Libre d'Associations et de Coopératives</h1>
                <h2>Bienvenue&nbsp;, créez un compte&nbsp;!</h2>
                <form id="form-inscription" name="form-inscription" method="post" action="PHP/ControlleursDeSession/inscription.redirect.php">
                    <legend><abbr title="Champ obligatoire">*</abbr></legend>
                    <input type="text" id="txt-prenom" name="txt-prenom" placeholder="*Prénom" maxlength="100" required>
                    <input type="text" id="txt-nom" name="txt-nom" placeholder="*Nom" maxlength="100" required>
                    <input type="email" id="courriel-inscription" name="courriel-inscription" aria-describedby="aideCourriel-inscription" placeholder="*Courriel" maxlength="150" required>
                    <input type="password" id="motDePasse-inscription" name="motDePasse-inscription" placeholder="*Mot de passe" maxlength="100" required title="Le mot de passe doit avoir une longueur minimum de 8 caractères et contenir au moins une lettre minuscule, une lettre majuscule, un chiffre et un caractère spécial de cette liste : !@#$%^&*()_+{}\[\]:;<>,.?~\\/-">
                    <input type="password" id="confirmation-motDePasse-inscription" name="confirmation-motDePasse-inscription" maxlength="100" placeholder="*Répétez le mot de passe" required>
                    <button type="submit" name="btn-inscription"> Créer un compte </button>
                </form>
                <hr>
                <a href="probleme_connexion.php" class="liens-formulaires">Mot de passe oublié&nbsp;?</a>
                <a href="connexion.php" class="liens-formulaires"> Vous avez déjà un compte&nbsp;? Connectez-vous&nbsp;!</a>
            </div>
        </div>
    </body>
</html>