<?php

require_once __DIR__ . '/../src/functions.php';

$pdo = ConnectToBDD(); //Connexion a la BDD

ajoutClient($pdo);

?>