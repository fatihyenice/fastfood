<?php
require_once "../../config/db_connect.php";
require_once "../../config/functions.php";

if (!empty($_POST['ville'])) {
    $ville = htmlspecialchars($_POST['ville']);

    if (strlen($ville) >= 2) {
        $recherche = $bdd->prepare('SELECT * FROM nos_restaurants WHERE ville LIKE :maville');
        $recherche->bindValue(":maville", "%" . $ville . "%");
        $recherche->execute();

        if ($recherche->rowCount() > 0) {
            $indent = 0;
            while ($affichage = $recherche->fetch()) { ?>
                <input type="radio" name="restaurant" value="<?= hsc($affichage['Id_restaurants']); ?>" id="resto<?= $indent; ?>">
                <label for="resto<?= $indent; ?>"><?= hsc($affichage['nom_restaurant']); ?></label>
<?php
                $indent++;
            }
        } else {
            echo "Aucun résultat !";
        }
    }
} else {
    echo "Entrez le nom d'une ville !";
}
