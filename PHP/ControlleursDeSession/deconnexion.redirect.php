<?php

require_once __DIR__."/sessionFinale.controller.php";

$session = new Session();
session_start();

$session->supprimer();

header("Location: ../../index.html");