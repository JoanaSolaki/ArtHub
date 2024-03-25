<?php
require "include/header.php";
require "include/navbar.php";
?>
    <section class="wrapper">

    <h1>Votre Profil</h1>

    <?php
    echo "<p>" . $prenom . " " . $nom . "<br>" . $mail;
    ?>

    </section>

<?php require "include/footer.php"; ?>