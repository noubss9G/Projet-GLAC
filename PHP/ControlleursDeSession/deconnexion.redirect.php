<?php

require_once __DIR__."/../Classes/session.class.php";

$session = new Session(60*10);
session_start();

$session->supprimer();

header("Location: ../../index.html");