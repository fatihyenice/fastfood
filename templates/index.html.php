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

    <?php require_once "header.html.php"; ?>

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
                    <a href="#nos-restaurants_section"><button type="button">VOIR LES MENUS <i class="ri-file-list-3-line"></i></button></a>
                </div>
            </div>
        </section>

        <section id="nos-restaurants_section">
            <h2>Une petite ou une grosse faim ? 🍔</h2>
            <div class="container--menus">
                <div class="menus" data-aos="zoom-in">
                    <div class="menus--image" style="background-image: url(https://png.pngtree.com/png-clipart/20240328/original/pngtree-fresh-sandwich-fast-food-png-image_14700088.png) !important;"></div>
                    <div class="menus--title">
                        Sandwich au jambon
                    </div>
                </div>

                <div class="menus" data-aos="zoom-in">
                    <div class="menus--image" style="background-image: url(https://static.vecteezy.com/system/resources/previews/039/651/892/non_2x/ai-generated-chicken-shawarma-wrap-isolated-on-transparent-background-png.png) !important;"></div>
                    <div class="menus--title">
                        Wrap kebab
                    </div>
                </div>

                <div class="menus" data-aos="zoom-in">
                    <div class="menus--image" style="background-image: url(https://lechalet-chassieu.fr/137-large_default/sandwich-le-classic-merguez.jpg) !important;"></div>
                    <div class="menus--title">
                        Pain Merguez
                    </div>
                </div>

                <div class="menus" data-aos="zoom-in">
                    <div class="menus--image" style="background-image: url(https://png.pngtree.com/png-clipart/20240328/original/pngtree-fresh-sandwich-fast-food-png-image_14700088.png) !important;"></div>
                    <div class="menus--title">
                        Sandwich au jambon
                    </div>
                </div>
            </div>
        </section>
    </section>

    <section id="order" class="page hidden">
        Je commande
    </section>
</body>

</html>