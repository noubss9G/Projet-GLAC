<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Problème de connexion</title>
    <link rel="stylesheet" href="CSS/style-formulaires-glac.css" type="text/css">
    <script src="JavaScript/validationChampsFormulaires.js"></script>
</head>
    <body>
        <!-- Fond semi-transparent -->
       <div class="div-superposition-form">
            <!-- Page du formulaire -->
            <div class="div-form">
                <img src="Images/Logo_GLAC.png" alt="Logo_GLAC" class="logo-glac">
                <h1 class="signification-acronyme">Gestionnaire Libre d'Associations et de Coopératives</h1>
                <h2>Mot de passe oublié&nbsp;?</h2>
                <p>Nous comprenons, les imprévus arrivent. Entrez simplement votre adresse e-mail ci-dessous et nous vous enverrons un lien pour réinitialiser votre mot de passe !</p>
                <form id="form-probleme-connexion" name="form-probleme-connexion" method="post" action="PHP/ControlleursDeSession/problemeConnexion.redirect.php">
                    <legend><abbr title="Champ obligatoire">*</abbr></legend>
                    <input type="email" id="courriel-echecConnexion" name="courriel-echecConnexion" aria-describedby="aideCourriel-echecConnexion" placeholder="*Entrez votre adresse e-mail..." required>
                    <button type="submit" name="btn-echecConnexion">Réinitialiser&nbsp;!</button>
                </form>
                <hr>
                <a href="inscription.php" class="liens-formulaires">Vous n'avez pas de compte&nbsp;? Créez-en un&nbsp;!</a>
                <a href="connexion.php" class="liens-formulaires">Vous avez déjà un compte&nbsp;? Connectez-vous&nbsp;!</a>
            </div>
       </div>
    </body>
</html>