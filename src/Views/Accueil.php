<?php
require "include/header.php";
require "include/navbar.php";
?>
    <section class="wrapper">

    <h1>Connectez-vous à l'inspiration</h1>

    <h2>Liste de professeurs</h2>

    <?php
        foreach ($professeurs as $professeur) {
                echo '<div class="professeur flex">
                    <img src="public/img/prof.jpg" alt="Photo de profil de professeur">
                    <div class="infoCard flex">' . 
                    '<h3>' . $professeur->getPrenom() . ' ' . $professeur->getNom() . '</h3>' .
                    '<p>' . $professeur->getDescription() . '<br>' .
                    $professeur->getPrixHeure() . '€/H<br>' .
                    $professeur->getVille() . '</p>' .
                    '<button>Réserver</button>
                </div>
            </div>';
                }
    ?>
    </section>

<?php require "include/footer.php"; ?>