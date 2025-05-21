<?php
    require_once __DIR__."/PHP/Classes/session.class.php";
    $session = new Session(60*30); // La durée de la session est de 10 minutes
    session_start();
    $session->validerSession(60*30, true);
    if (session_status() != PHP_SESSION_ACTIVE)
    {
        header("Location: /connexion.php?session=sessionExpire");
        exit();
    }
    // echo '<pre>';
    // print_r($_SESSION);
    // echo '</pre>';
?>
<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>GLAC - Accueil</title>
        <link rel="stylesheet" href="CSS/style-general-glac.css" type="text/css">
        <script src=""></script>
    </head>
    <body>
            <?php
                // if(isset($_GET["session"]))
                // {
                //     if($_GET["session"] == "utilisateurAuthentifie")
                //     {
                //         echo "Page d'accueil \r\n";
                //         echo "index.html";
                //     }
                //     elseif($_GET["session"] == "sessionExpire")
                //     {
                //         echo "<script>alert('Votre session a expiré. Veuillez vous reconnecter.');</script>";
                //     }
                // }
            ?>

        <nav class="nav-barre-laterale">
            <ul class="menu">
                <li>
                    <a href="index.php?session=utilisateurAuthentifie" class="logo-menu">
                        <img src="Images/Logo_GLAC.png" alt="Logo GLAC" class="logo-glac" >
                    </a>
                </li>
                <hr>
                <li >
                    <a class="titre-sous-menu" href="">Gestion de la coopérative</a>
                    <ul class="sous-menu">
                        <li class="option-sous-menu"><a href="">Créer une coopérative</a></li>
                        <li class="option-sous-menu"><a href="">Mettre à jour une coopérative</a></li>
                        <li class="option-sous-menu"><a href="">Afficher le rapport de la coopérative</a></li>
                        <li class="option-sous-menu"><a href="">Dissoudre une coopérative</a></li>
                    </ul>
                </li>
                <hr>
                <li>
                    <a class="titre-sous-menu" href="">Gestion des membres de la coopérative</a>
                    <ul class="sous-menu">
                        <li class="option-sous-menu"><a href="">Inscription d'un membre</a></li>
                        <li class="option-sous-menu"><a href="">Mettre à jour un membre</a></li>
                        <li class="option-sous-menu"><a href="">Rechercher un membre</a></li>
                        <li class="option-sous-menu"><a href="">Ajouter un utilisateur à la coopérative</a></li>
                        <li class="option-sous-menu"><a href="">Retirer un membre de la coopérative</a></li>
                    </ul>
                </li>
                <hr>
                <li>
                    <a class="titre-sous-menu" href="">Gestion des élections</a>
                    <ul class="sous-menu">
                        <li class="option-sous-menu"><a href="">Créer une élection</a></li>
                        <li class="option-sous-menu"><a href="">Mettre à jour une élection</a></li>
                        <li class="option-sous-menu"><a href="">Consulter une élection</a></li>
                        <li class="option-sous-menu"><a href="">Annuler une élection</a></li>
                    </ul>
                </li>
                <hr>
                <li>
                    <a class="titre-sous-menu" href="">Gestion des candidatures</a>
                    <ul class="sous-menu">
                        <li class="option-sous-menu"><a href="">Créer une candidature</a></li>
                        <li class="option-sous-menu"><a href="">Mettre à jour une candidature</a></li>
                        <li class="option-sous-menu"><a href="">Consulter une candidature</a></li>
                        <li class="option-sous-menu"><a href="">Annuler une candidature</a></li>
                    </ul>
                </li>
                <hr>
                <li>
                    <a class="titre-sous-menu" href="">Chat</a>
                    <ul class="sous-menu">
                        <li class="option-sous-menu"><a href="">Rejoindre un chat</a></li>
                    </ul>
                </li>
            </ul>   
        </nav>
        <main>
            <header>
                <form name="form-recherche" id="form-recherche" action="PHP/RequetesBDUtilisateur/recherche.redirect.php" method="post">
                    <input type="search" name="barre-recherche" id="barre-recherche" placeholder="Rechercher une association..." aria-label="Rechercher une association...">
                    <button type="submit" name="btn-recherche" id="btn-recherche">Rechercher</button>
                </form>
                <div class="div-en-tete">
                    <img src="Images/notification_icon.jpeg" alt="notification" class="notification-icon">
                    <img src="Images/messagerie_icon.jpeg" alt="messagerie" class="messagerie-icon">
                    <?php
                        echo "<p class=\"nom-utilisateur\">Bonjour, ".$_SESSION["prenom_utilisateur"]." ".$_SESSION["nom_utilisateur"]."</p>";
                    ?>
                </div>
            </header>
            <section class="section-principale">
                <h1>Associations dont vous pourrez faire partie</h1>
                <article class="case-association">
                    <table class="tableau-association">
                        <tr>
                            <th rowspan="4"><img src="" alt="Logo de l'association" class="logo-glac"></th>
                        </tr>
                        <tr>
                            <td class="nom-association">Nom</td>
                        </tr>
                        <tr>
                            <td class="description-association">Description</td>
                        </tr>
                        <tr>
                            <td class="slogan-association">Slogan</td>
                        </tr>
                    </table>
                </article>
            </section>
            <footer class="pied-de-page">
                <p class="pied">Copyright &copy; 2025 GLAC</p>
                <p class="pied">Site web réalisé par : Armel Gaetan Noubissie Tchamabe</p>
                <p class="pied"><a href="mailto:2338041@cegepat.qc.ca">M'envoyer un courriel</a></p>
            </footer>
        </main>   
    </body>
</html>