<?php
require_once "../config/db_connect.php";
require_once "../config/functions.php";
?>
<section id="nosproduits" class="page hidden">
    <div class="banniere-nosproduits"></div>

    <div class="container-categorie">
        <?php
        foreach ($getCategorie as $categorie) {
        ?>
            <div class="categorie" data-aos="zoom-in" data-categorie-id="<?= intval($categorie['categorie_id']); ?>">
                <div class="categorie-image" style="background-image: url(<?= !empty($categorie["urlimage_categorie"]) ? hsc($categorie['urlimage_categorie']) : "/assets/images/undefined.png" ?>);">
                    <div class="categorie-title">
                        <?= hsc($categorie['nom_categorie']); ?>
                    </div>

                    <div class="categorie-total-produits">
                        <?= intval($categorie['total']); ?> produit<?= ($categorie['total'] > 1) ? "s" : "" ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</section>