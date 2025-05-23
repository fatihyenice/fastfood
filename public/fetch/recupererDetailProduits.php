<?php
require_once "../../config/db_connect.php";
require_once "../../config/functions.php";

if (!empty($_POST['id-produits'])) {
    $id_produits = intval($_POST['id-produits']);

    $reqIdProduits = $bdd->prepare('SELECT * FROM produits WHERE id_produits = :idproduits');
    $reqIdProduits->bindValue(":idproduits", $id_produits);
    $reqIdProduits->execute();

    $recupererProduits = $reqIdProduits->fetch();

    if ($recupererProduits) {
?>

        <div class="container-menu">
            <div class="retourner-arriere">
                <i class="ri-arrow-left-line"></i>
            </div>

            <div class="container-deux">

                <div class="menu-image" style="background-image: url(<?= hsc($recupererProduits['urlimage_produits']); ?>);"></div>

                <div class="menu-detail">
                    <h1><?= hsc($recupererProduits['nom_produits']); ?></h1>
                    <p><?= hsc($recupererProduits['description_produits']); ?></p>
                </div>
            </div>

        </div>
    <?php } else { ?>

    <?php } ?>
<?php } ?>