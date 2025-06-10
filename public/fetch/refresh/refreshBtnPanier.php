<?php
require_once __DIR__ . "/../../../config/db_connect.php";
require_once __DIR__ . "/../../../config/functions.php";
session_start();

if (!empty($_SESSION['auth'])) {
    $requeteUser = $bdd->prepare('SELECT * FROM utilisateur WHERE mail = :myemail');
    $requeteUser->bindValue(":myemail", $_SESSION['auth']);
    $requeteUser->execute();

    $user = $requeteUser->fetch();
}

if (!empty($_POST['userid'])) {
    $idUser = $_POST['userid'];

    $verifCommande = $bdd->prepare('SELECT * FROM commande_detail WHERE Id_utilisateur = :myid');
    $verifCommande->bindValue(":myid", $idUser);
    $verifCommande->execute();

    if ($verifCommande->rowCount() > 0) {
?>
        <div class="btn-validerpanier" datauserId="<?= intval($user['Id_utilisateur']); ?>">
            Valider mon panier
        </div>
    <?php } else { ?>
        <div class="btn-validerpanier desactive" datauserId="<?= intval($user['Id_utilisateur']); ?>">
            Valider mon panier
        </div>
<?php }
} ?>