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
        <a href="/supprimer">Supprimer mon compte</a>
    </article>

    <article>
        <h2>Vos réservations :</h2>

        <?php
            foreach ($reservationsAll as $reservationAll) {
                $reservation = $reservationAll['reservation'];
                $professeur = $reservationAll['professeur'];
                $salle = $reservationAll['salle'];

                echo '<div class="reservation">' .
                    '<h3>Cours le ' . $reservation->getDate() . ' à ' . $reservation->getHeure() . '</h3>' .
                    '</div>';

                echo '<div class="infoReservation"> <p>Adresse : ' . $salle->getAdresse() . '</p>' .
                    '<p>' . $professeur->getPrenom() . ' ' . $professeur->getNom() . '<br>' .
                    $professeur->getDescription() . '</p>' .
                    '<a href="">Modifier</a>' .
                    '<a href="">Supprimer</a>' .
                    '</div>';
            }
        ?>
        </div>

    </article>

</section>

<?php require "include/footer.php"; ?>