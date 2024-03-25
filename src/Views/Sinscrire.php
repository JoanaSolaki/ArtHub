<?php
require "include/header.php";
require "include/navbar.php";
?>
    <section class="wrapper">

    <h1>S'inscrire</h1>

    <form action="/Sinscrire" method="post">
        <label for="nom">Nom
            <input type="text" name="nom" id="nom" minlength="3" maxlength="50" required>
        </label>

        <label for="prenom">prenom                          
            <input type="text" name="prenom" id="prenom" minlength="3" maxlength="50" required>
        </label>

        <label for="mdp"> Mot de passe
            <input type="password" name="mdp" id="mdp" minlength="7" required>
        </label>

        <label for="mail"> E-mail
            <input type="mail" name="mail" id="mail" minlength="3"  maxlength="80" required>
        </label>

        <input type="submit" value="submit">
    </form>

    </section>

<?php require "include/footer.php"; ?>