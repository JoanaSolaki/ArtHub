<?php
if (!isset($_SESSION['utilisateurId'])) {
    header('Location: /seconnecter');
}
require "include/header.php";
require "include/navbar.php";
?>
<section class="wrapper">

    <h1>Votre Profil</h1>

    <article>
        <?php
        echo "<p>" . $utilisateur->getPrenom() . " " . $utilisateur->getNom() . "<br>" . $utilisateur->getMail();
        ?>
        <a href="/modifier">Modifier le profil</a>
        <a href="">Supprimer mon compte</a>
    </article>

    <article>
        <h2>Vos réservations :</h2>
    </article>

</section>

<?php require "include/footer.php"; ?>