<?php
require "include/header.php";
require "include/navbar.php";

?>
    <section class="wrapper">

    <h1>Votre Profil</h1>

    <?php
    echo "<p>" . $utilisateur->getPrenom() . " " . $utilisateur->getNom() . "<br>" . $utilisateur->getMail();
    ?>

    </section>

<?php require "include/footer.php"; ?>