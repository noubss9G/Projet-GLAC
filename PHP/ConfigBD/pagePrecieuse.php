<?php
    require_once __DIR__."/../ControlleursDeSession/sessionFinale.controller.php";
    
    $session = new SessionConnexion();
    session_start();
    $session->validerSession();

?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Information confidentielle</h1>
    <a href="../ControlleursDeSession/deconnexion.redirect.php">Déconnexion du site</a>
</body>
</html>
