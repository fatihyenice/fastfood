<?php
require_once __DIR__ . "/../../../config/db_connect.php";
require_once __DIR__ . "/../../../config/functions.php";

$reqSixProduits = $bdd->query('SELECT * FROM produits ORDER BY RAND() LIMIT 6');
$afficherProduits = $reqSixProduits->fetchAll();
foreach ($afficherProduits as $produit) {
?>
    <div class="menus" data-aos="zoom-in" data-id-produit="<?= hsc($produit['id_produits']); ?>">
        <div class="menus--image" style="background-image: url(<?= hsc($produit['urlimage_produits']); ?>) !important;"></div>
        <div class="menus--title">
            <span><?= hsc($produit['nom_produits']); ?></span>
            <span class="menus--prix"><?= hsc($produit['prix_produits']); ?>€</span>
        </div>
    </div>
<?php } ?>