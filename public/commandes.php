<html>

<head>
<title>Commandes</title>
<meta charset="utf-8">
</head>

<body>
<h1>Gestion des Commandes</h1>
<a href="ajoutcommande.php">Ajouter une commande</a> / <a href="index.html">Accueil</a>
<br>
<h1>Liste des Commandes</h1>

<table width="700px">
<th align="left">Id.</th>
<th align="left">Numéro de commande</th>
<th align="left">Date de commande</th>
<th align="left">Livreur</th>
<th align="left">Client</th>
<?php

require_once __DIR__ . '/../src/functions.php';
$pdo = ConnectToBDD(); //Connexion a la BDD

listCommande($pdo);

?>

</body>

</table>

</html>