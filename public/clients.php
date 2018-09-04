<html>

<head>
<title>Clients</title>
<meta charset="utf-8">
</head>

<body>
<h1>Gestion des Clients</h1>
<a href="ajoutclient.html">Ajouter un client</a> / <a href="index.html">Accueil</a>
<br>
<h1>Liste des Clients</h1>

<table width="700px">
<th align="left">Id.</th>
<th align="left">Nom</th>
<th align="left">Prénom</th>
<th align="left">Ville</th>
<th align="left">Age</th>
<?php

require_once __DIR__ . '/../src/functions.php';
$pdo = ConnectToBDD(); //Connexion a la BDD

listClient($pdo);

?>

</body>

</table>

</html>