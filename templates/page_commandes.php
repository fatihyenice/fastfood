<section id="order" class="page hidden">

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
                <p class="login-note">Pas encore de compte ? <a href="#">Inscrivez-vous</a></p>
            </div>
        </div>
    <?php } else {
        echo "connecté !";
    } ?>
</section>