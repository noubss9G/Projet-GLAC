<?php
    require_once __DIR__."/PHP/Classes/session.class.php";
    $session = new Session(60*30); // La durée de la session est de 10 minutes
    session_start();
    $session->validerSession(60*30, true);
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
        <link rel="stylesheet" href="CSS/style-glac.css" type="text/css">
        <script src=""></script>
    </head>
    <body>
        
        <header>
            <?php
                if(isset($_GET["session"])){
                    if($_GET["session"] == "utilisateurAuthentifie"){
                        echo "Page d'accueil";
                        echo "index.html";
                    }
                }
            ?>
        </header>

        <main>

        </main>

        <footer>

        </footer>
        
    </body>
</html>