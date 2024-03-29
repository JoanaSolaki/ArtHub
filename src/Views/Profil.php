<?php
if (!isset($_SESSION['utilisateurId'])) {
    header('Location: /seconnecter');
}
require "include/header.php";
require "include/navbar.php";
?>
<section class="wrapper flex">

    <article class="profil">
        <h1>Votre Profil</h1>
        <?php
        echo "<p>" . $utilisateur->getPrenom() . " " . $utilisateur->getNom() . "<br>" . $utilisateur->getMail();
        ?>
        <a href="/modifier" class="reservation">Modifier le profil</a>
        <a href="/supprimer" class="supprimer">Supprimer mon compte</a>
    </article class="profil">

    <article class="profil">
        <h2 class="reservation" >Vos réservations :</h2>

        <?php
            foreach ($reservationsAll as $reservationAll) {
                $reservation = $reservationAll['reservation'];
                $professeur = $reservationAll['professeur'];
                $cours = $reservationAll['cours'];
                $salle = $reservationAll['salle'];

                $idReservation = $reservation->getId();

                $_GET['idReservation'] = $idReservation;

                echo '<div class="reservation">' .
                    '<h3>Cours le ' . $reservation->getDate() . ' à ' . $reservation->getHeure() . '</h3>' .
                    '</div>';

                echo '<div class="infoReservation"> <p>Adresse : ' . $salle->getAdresse() . '</p>' .
                    '<p>' . $professeur->getPrenom() . ' ' . $professeur->getNom() . '</p>';
                    
                foreach ($cours as $cour) {
                   echo '<p>' . $cour->getType() . '</p>'; }
                echo '<a href="/modifierReservation' . '?id=' . $idReservation . '" class="reservation">Modifier</a>' .
                '<a href="/deleteReservation?id=' . $idReservation . ' " class="supprimer">Supprimer</a>' .
                '</div>';
            }
        ?>
        </div>

    </article>

</section>

<?php require "include/footer.php"; ?>