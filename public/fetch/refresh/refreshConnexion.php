<?php
require_once __DIR__ . "/../../../config/db_connect.php";
require_once __DIR__ . "/../../../config/functions.php";
session_start();
$reqCategorie = $bdd->query('SELECT * FROM categorie_produits');
$getCategorie = $reqCategorie->fetchAll();

if (!empty($_SESSION['auth'])) {
    $requeteUser = $bdd->prepare('SELECT * FROM utilisateur WHERE mail = :myemail');
    $requeteUser->bindValue(":myemail", $_SESSION['auth']);
    $requeteUser->execute();

    $user = $requeteUser->fetch();
}
?>

<?php if (empty($_SESSION['auth'])) { ?>
    <div class="banniere-connexion"></div>

    <div class="erreurform"></div>
    <div class="successform"></div>

    <div class="login-section">
        <div class="login-container">
            <h1 class="login-title">Connexion</h1>
            <form class="login-form">
                <input type="text" placeholder="Adresse mail" id="mail" required />
                <input type="password" placeholder="Mot de passe" id="motdepasse" required />
                <button type="submit" id="btn-connexion">Se connecter</button>
            </form>
            <p class="login-note">Pas encore de compte ? <span class="btn-register">Inscrivez-vous</span></p>
        </div>
    </div>

    <div class="register-section">
        <div class="register-container">
            <h1 class="register-title">Inscription</h1>
            <form class="register-form">
                <input type="text" placeholder="Nom complet" id="nom" required />
                <input type="text" placeholder="Prénom complet" id="prenom" required />
                <input type="email" placeholder="Adresse mail" id="email" required />
                <input type="password" placeholder="Mot de passe" id="password" required />
                <input type="password" placeholder="Confirmer le mot de passe" id="confirm-password" required />
                <button type="submit" id="btn-register">S'inscrire</button>
            </form>
            <p class="register-note">Déjà un compte ? <span class="btn-login">Connectez-vous</span></p>
        </div>
    </div>

<?php } else { ?>
    <?php
    if (!empty($_SESSION['restaurant'])) {
    ?>
        <div class="panier-bottom">
            <div class="btn-validerpanier desactive" datauserId="<?= intval($user['Id_utilisateur']); ?>">
                Valider mon panier
            </div>
        </div>
    <?php } else { ?>
        <div class="panier-bottom">
            <div class="btn-suivant">
                Suivant
            </div>
        </div>
    <?php } ?>

    <?php
    if (empty($_SESSION['restaurant'])) {
    ?>
        <div id="etapeChoixRestau">
            <div class="box-restau">
                <h1>Choix de votre restaurant</h1>
                <form method="POST">
                    <label>Entrer le nom de votre ville:</label>
                    <input type="text" id="nomville" placeholder="Exemple: Nancy">
                </form>

                <div id="resultat-restau">
                </div>
            </div>
        </div>
    <?php } else { ?>

        <div class="disposition">
            <div class="barrelateral">
                <div class="menulatteral">
                    <ul>
                        <?php
                        foreach ($getCategorie as $categorie) {
                        ?>
                            <li data-catidcommande="<?= hsc($categorie['categorie_id']); ?>"><i class="ri-file-list-3-line"></i> <?= hsc($categorie['nom_categorie']); ?></li>
                        <?php } ?>
                    </ul>
                </div>
            </div>

            <div class="produit-commande">
                <?php
                if (empty($_POST['id'])) {
                    $id = 1;
                }

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
            </div>
        </div>

    <?php } ?>
<?php } ?>