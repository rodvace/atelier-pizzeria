<html>

<head>
<title>Ajouter une Commande</title>
<meta charset="utf-8">
</head>

<body>
<a href="clients.php">Annuler</a>

<h1>Ajout d'une Commande</h1>

<form action="ajoutcommande2.php" method="POST">

<table width="500px">
<tr><td>Numéro :</td><td><input type="text" name="numero_commande"></td></tr>
<tr><td>Date :</td><td><input type="date" name="date_commande"></td></tr>

<tr><td>Livreur :</td>
<td>
<?php
require_once __DIR__ . '/../src/functions.php';
$pdo = ConnectToBDD(); //Connexion a la BDD
listLivreurs($pdo);
?>
</td></tr>

<tr><td>Client :</td>
<td>
<?php
require_once __DIR__ . '/../src/functions.php';
$pdo = ConnectToBDD(); //Connexion a la BDD
listClients($pdo);
?>
</td></tr>

<tr><td></td><td><input type="submit" value="Ajouter"></td></tr>
<table>

</form>
</body>

</html>