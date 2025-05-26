<section id="produit-categorie" class="page hidden">
    <div class="banniere_toutproduit"></div>

    <div class="navigation-categorie">
        <div class="navigation-container">
            <ul>
                <?php
                foreach ($getCategorie as $categorie) {
                ?>
                    <a href="#">
                        <li class="<?= ($categorie["categorie_id"] == 1) ? "selected-categorie" : "" ?>"><?= hsc($categorie['nom_categorie']); ?></li>
                    </a>
                <?php } ?>
            </ul>
        </div>
    </div>

    <div class="produits">
        <?php

        if (empty($idCategorie)) {
            $idCategorie = 100;
        }

        if (!empty($idCategorie)) {
            $reqVerifierCategorie = $bdd->prepare('SELECT * FROM categorie_produits cat INNER JOIN produits prod ON cat.categorie_id = prod.categorie_id WHERE cat.categorie_id = :idcat');
            $reqVerifierCategorie->bindValue(":idcat", $idCategorie);
            $reqVerifierCategorie->execute();

            $categorieExistant = $reqVerifierCategorie->rowCount();

            if ($categorieExistant > 0) {
                $produits = $reqVerifierCategorie->fetchAll();
        ?>
                <div class="produit-container">
                    <?php foreach ($produits as $produit) { ?>
                        <div class="produit-detail" data-produit-id="<?= hsc($produit['id_produits']); ?>">
                            <?= hsc($produit['nom_produits']); ?>
                        </div>
                    <?php } ?>
                </div>

            <?php } else { ?>
                <div class=" alerte-erreur">
                    Aucun produit trouvé !
                </div>
            <?php } ?>

        <?php } ?>
    </div>
</section>