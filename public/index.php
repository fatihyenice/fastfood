<?php
require_once "../config/db_connect.php";
require_once "../config/functions.php";

$reqSixProduits = $bdd->query('SELECT * FROM produits ORDER BY RAND() LIMIT 6');
$afficherProduits = $reqSixProduits->fetchAll();

require_once "../templates/index.html.php";
