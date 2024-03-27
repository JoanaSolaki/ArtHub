<?php
if (!isset($_SESSION['utilisateurId'])) {
    header('Location: /seconnecter');
}
require "include/header.php";
require "include/navbar.php";
?>
    <section class="wrapper">

        <h1>Êtes-vous certain de vouloir supprimer votre compte ?</h1>
        <h2>Cette action est irréversible</h2>

        <a href="/delete">Oui, supprimez</a>
        <a href="/profil">Retour au profil</a>
    </section>

<?php require "include/footer.php"; ?>