<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>SnackExpress</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@4.6.0/fonts/remixicon.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css" />
    <link rel="stylesheet" href="assets/style/global.css" />
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script src="assets/js/app.js" defer></script>

</head>

<body>
    <?php require_once "chargement.php"; ?>
    <?php require_once "header.php"; ?>

    <section id="home" class="page">
        <div class="jecommande"></div>

        <div id="modalcommande">
            <div id="modalcommande--droite">
                <div class="modalcommande-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>
        </div>

        <section id="big--home_section">
            <div class="big--home_filtre">
                <div class="big--home_textdisposition">
                    <h1>Bienvenue chez SnackExpress </h1>
                    <h2>Le goût rapide, frais et savoureux à chaque bouchée !</h2>
                    <button type="button" class="voirmenu">VOIR LES MENUS <i class="ri-file-list-3-line"></i></button>
                </div>
            </div>
        </section>

        <section id="nos-restaurants_section">
            <h2>Une petite ou une grosse faim ? 🍔</h2>
            <div class="container--menus">
                <?php
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
            </div>
        </section>
    </section>

    <?php require_once "page_detail_menu.php"; ?>
    <?php require_once "page_ensembleproduits.php"; ?>
    <?php require_once "page_nosproduits.php"; ?>
    <?php require_once "page_commandes.php"; ?>
    <?php require_once "page_cherche_resto.php"; ?>
</body>

</html>