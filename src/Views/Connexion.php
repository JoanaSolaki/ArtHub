<?php
require "include/header.php";
require "include/navbar.php";
?>
    <section class="wrapper">

        <h1>Se connecter</h1>

        <form action="<?php URL_CONNEXIONPAGE ?>" method="post" class="flex">

            <label for="mail"> E-mail
                <input type="mail" name="mail" id="mail" minlength="3"  maxlength="80" required>
            </label>

            <label for="mdp"> Mot de passe
                <input type="password" name="mdp" id="mdp" minlength="7" required>
            </label>

            <input type="submit" value="Se connecter">
        </form>
    </section>

<?php require "include/footer.php"; ?>