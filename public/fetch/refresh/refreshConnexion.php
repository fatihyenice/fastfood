<?php
require_once __DIR__ . "/../../../config/db_connect.php";
require_once __DIR__ . "/../../../config/functions.php";
session_start();
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
            <div class="btn-validerpanier">
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
        <div id="etapeChoixRestau">
            <div class="box-restau">
                <h1>COMMANDES</h1> 
            </div>
        </div>
    <?php } ?>
<?php } ?>