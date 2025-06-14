<?php
session_start();
require_once "../config/db_connect.php";
require_once "../config/functions.php";

$reqSixProduits = $bdd->query('SELECT * FROM produits ORDER BY RAND() LIMIT 6');
$afficherProduits = $reqSixProduits->fetchAll();

$reqCategorie = $bdd->query('SELECT *, COUNT(prod.id_produits) as total FROM categorie_produits cat INNER JOIN produits prod ON cat.categorie_id = prod.categorie_id GROUP BY cat.categorie_id');
$getCategorie = $reqCategorie->fetchAll();

if (!empty($_SESSION['auth'])) {
    $requeteUser = $bdd->prepare('SELECT * FROM utilisateur WHERE mail = :myemail');
    $requeteUser->bindValue(":myemail", $_SESSION['auth']);
    $requeteUser->execute();

    $user = $requeteUser->fetch();
}

require_once "../templates/index.php";
