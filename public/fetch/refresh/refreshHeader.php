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
?>
<div class="nav--cta_disposition">
    <a href="" data-page="home">Accueil</a>
    <a href="" data-page="nosproduits">Nos produits</a>
    <a href="" data-page="searchresto">Trouver un resto</a>

    <?php if (!empty($_SESSION['auth'])) { ?>
        <a href="" data-page="searchresto"><i class="ri-map-pin-user-fill"></i> <?= hsc($user['nom']) . " " . hsc($user['prenom']); ?></a>
        <a id="logoutbtn"><i class="ri-logout-box-r-line"></i> Déconnexion</a>
    <?php } ?>

    <a href="">Contact</a>
    <a href="" class="commander-button" data-page="order">Commander</a>
</div>
<div class="icon-burger">
    <i class="ri-menu-line"></i>
</div>