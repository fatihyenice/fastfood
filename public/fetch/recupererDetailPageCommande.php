<?php
require_once "../../config/db_connect.php";
require_once "../../config/functions.php";

if (!empty($_POST['id'])) {
    $id = intval($_POST['id']);

    $reqVerifierCategorie = $bdd->prepare('SELECT * FROM categorie_produits cat INNER JOIN produits prod ON cat.categorie_id = prod.categorie_id WHERE cat.categorie_id = :idcat');
    $reqVerifierCategorie->bindValue(":idcat", $id);
    $reqVerifierCategorie->execute();


    $categorieExistant = $reqVerifierCategorie->rowCount();

    if ($categorieExistant > 0) {
        $produits = $reqVerifierCategorie->fetchAll();
        foreach ($produits as $produit) {  ?>
            <div class="produit" data-aos="fade-down">
                <h2><?= hsc($produit['nom_produits']); ?></h2>
                <div class="produit-image" data-detailcommande-produit-id="<?= hsc($produit['id_produits']); ?>" style="background-image: url( <?= hsc($produit['urlimage_produits']); ?>)"></div>
            </div>
<?php
        }
    }
}
?>