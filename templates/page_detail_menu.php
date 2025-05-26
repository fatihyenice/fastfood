<section id="detail-menu" class="page hidden">
    <?php
    require_once "../config/db_connect.php";
    require_once "../config/functions.php";

    if (empty($_POST['id-produits'])) {
        $_POST['id-produits'] = 1;
    }

    if (!empty($_POST['id-produits'])) {
        $id_produits = intval($_POST['id-produits']);

        $reqIdProduits = $bdd->prepare('SELECT * FROM produits prod INNER JOIN integrer inte ON prod.id_produits = inte.id_produits INNER JOIN aliments alim ON inte.id_aliment = alim.id_aliment WHERE prod.id_produits = :idproduits');
        $reqIdProduits->bindValue(":idproduits", $id_produits);
        $reqIdProduits->execute();


        $recupererProduits = $reqIdProduits->fetchAll();

        if ($reqIdProduits->rowCount() > 0) {
    ?>

            <div class="container-menu">
                <div class="retourner-arriere">
                    <i class="ri-arrow-left-line"></i>
                </div>

                <div class="container-deux">

                    <div class="menu-image" style="background-image: url(<?= hsc($recupererProduits[0]['urlimage_produits']); ?>);"></div>

                    <div class="menu-detail">
                        <h1><?= hsc($recupererProduits[0]['nom_produits']); ?></h1>
                        <p><?= hsc($recupererProduits[0]['description_produits']); ?><br><br></p>
                        <p class="ingredient">Ingrédients:<br><br>
                            <?php
                            foreach ($recupererProduits as $ingredients) {
                                echo "<li class='ingredientliste'><i class='ri-restaurant-2-line'></i> " . hsc($ingredients['nom_aliment'])  . (($ingredients['retirable'] == 1) ? ' (amovible)' : '') . " </li><br>";
                            }
                            ?>

                        </p>

                        <div class="btn-ajouterpanier">
                            Ajouter au panier
                        </div>
                    </div>
                </div>

            </div>
        <?php } else { ?>
            <div class="alerte-erreur">
                Aucun produit n'a été trouvé !
            </div>
        <?php } ?>
    <?php } ?>
</section>