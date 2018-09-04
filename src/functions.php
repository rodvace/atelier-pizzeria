<?php

// Connexion à la base de données
function ConnectToBDD() {
    try {
        $dsn = 'mysql:dbname=pizzeria;host=localhost';
        $user = 'root';
        $password = '';
        $pdo = new PDO($dsn, $user, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $pdo;
        }   
    catch (PDOException $e) {
        echo 'Unable to connect :' .$e->getMessage();
        }
}

// Fonction lister les Pizzas dans un tableau
function listPizza($pdo)
{
    try {
        $stmt = $pdo->prepare("
        SELECT id, libelle, reference, prix, url_image FROM pizza;
        ");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td><td>'. $row['libelle'].'</td><td>'.$row['reference'].'</td><td>'.$row['prix'].'</td><td>'.'<img src="images/'.$row['url_image'].'" width="200px"></td>';
            echo '</tr>';
        }
    } 
    catch (PDOException $e) 
        {
        echo $e->getMessage();
        }
}

// Fonction lister les Pizzas dans un tableau
function listClient($pdo)
{
    try {
        $stmt = $pdo->prepare("
        SELECT id, nom, prenom, ville, age FROM client;
        ");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td><td>'. $row['nom'].'</td><td>'.$row['prenom'].'</td><td>'.$row['ville'].'</td><td>'.$row['age'].'</td>';
            echo '</tr>';
        }
    } 
    catch (PDOException $e) 
        {
        echo $e->getMessage();
        }
}

// Fonction lister les Commandes dans un tableau
function listCommande($pdo)
{
    try {
        $stmt = $pdo->prepare("
        SELECT commande.id, commande.numero_commande, commande.date_commande, client.nom as client_nom, client.prenom as client_prenom, livreur.nom as livreur_nom, livreur.prenom as livreur_prenom FROM commande
        INNER JOIN client ON client.id = commande.client_id
        INNER JOIN livreur ON livreur.id = commande.livreur_id;
        ");
        $stmt->execute();
        while ($row = $stmt->fetch()) {
            echo '<tr>';
            echo '<td>'.$row['id'].'</td><td>'. $row['numero_commande'].'</td><td>'.$row['date_commande'].'</td><td>'.$row['livreur_nom'].' '.$row['livreur_prenom'].'</td><td>'.$row['client_nom'].' '.$row['client_prenom'].'</td>';
            echo '</tr>';
        }
    } 
    catch (PDOException $e) 
        {
        echo $e->getMessage();
        }
}

// Fonction ajouter une Nouvelle Pizza
function ajoutPizza($pdo)
{
    try {
        $stmt = $pdo->prepare("
        INSERT INTO pizza (libelle, reference, prix, url_image)
        VALUES (:libelle, :reference, :prix, :url_image);
        ");
        $stmt->execute(['libelle' => ($_POST['libelle']), 'reference' => ($_POST['reference']), 'prix' => ($_POST['prix']), 'url_image' => ($_POST['url_image'])]);
        echo '<h1>Bravo !</h1>';
        echo 'Votre Pizza fait désomais partie de la liste !';
        echo '<br><br>';
        echo '<a href="pizzas.php">Retourner à la liste des Pizzas</a>';
         } 
    catch (PDOException $e) 
        {
        echo $e->getMessage();
        }
}

// Fonction ajouter un Client
function ajoutClient($pdo)
{
    try {
        $stmt = $pdo->prepare("
        INSERT INTO client (nom, prenom, ville, age)
        VALUES (:nom, :prenom, :ville, :age);
        ");
        $stmt->execute(['nom' => ($_POST['nom']), 'prenom' => ($_POST['prenom']), 'ville' => ($_POST['ville']), 'age' => ($_POST['age'])]);
        echo '<h1>Bravo !</h1>';
        echo 'Ce client fait désormais parti de notre liste !';
        echo '<br><br>';
        echo '<a href="clients.php">Retourner à la liste des Clients</a>';
         } 
    catch (PDOException $e) 
        {
        echo $e->getMessage();
        }
}

// Fonction Lister les livreurs en BDD
function listLivreurs($pdo)
{
    try {
        $stmt = $pdo->prepare("
        SELECT id, nom, prenom FROM livreur;
        ");
        $stmt->execute();
        echo '<select name="livreur_id">';
        while ($row = $stmt->fetch()) {
            echo '<option value="'.$row['id'].'">'.$row['nom'].' '.$row['prenom'].'</option>';
        }
        echo '</select>';
    } 
    catch (PDOException $e) 
        {
        echo $e->getMessage();
        }
}

// Fonction Lister les clients en BDD
function listClients($pdo)
{
    try {
        $stmt = $pdo->prepare("
        SELECT id, nom, prenom FROM client;
        ");
        $stmt->execute();
        echo '<select name="client_id">';
        while ($row = $stmt->fetch()) {
            echo '<option value="'.$row['id'].'">'.$row['nom'].' '.$row['prenom'].'</option>';
        }
        echo '</select>';
    } 
    catch (PDOException $e) 
        {
        echo $e->getMessage();
        }
}

// Fonction ajouter une Nouvelle Commande
function ajoutCommande($pdo)
{
    try {
        $stmt = $pdo->prepare("
        INSERT INTO commande (numero_commande, date_commande, livreur_id, client_id)
        VALUES (:numero_commande, :date_commande, :livreur_id, :client_id);
        ");
        $stmt->execute(['numero_commande' => ($_POST['numero_commande']), 'date_commande' => ($_POST['date_commande']), 'livreur_id' => ($_POST['livreur_id']), 'client_id' => ($_POST['client_id'])]);
        echo '<h1>Bravo !</h1>';
        echo 'Votre Commande fait désomais partie de la liste !';
        echo '<br><br>';
        echo '<a href="commandes.php">Retourner à la liste des Commandes</a>';
         } 
    catch (PDOException $e) 
        {
        echo $e->getMessage();
        }
}


?>