<?php
if (!isset($_SESSION['utilisateurId'])) {
    header('Location: /seconnecter');
}
require "include/header.php";
require "include/navbar.php";
?>
    <section class="wrapper">

        <h1>Modifier votre cours</h1>

        <form action="<?php URL_MODIFICATIONRESERVATION ?>" method="post" class="flex">

            <label for="date"> Date
                <input type="date" name="date" id="date" required>
            </label>

            <label for="heure"> Heure (de 8h à 17h)
                <input type="time" name="heure" id="heure" min="08:00" max="17:00" required>
            </label>
            
            <label for="professeur">Choissisez votre professeur :</label>
            <select name="professeur"> 
                <?php
                    foreach ($professeurs as $professeur) {
                        echo '<option value="' . $professeur->getId() .'">' . $professeur->getPrenom() . ' ' . $professeur->getNom() . '</option>';
                    }
                ?>
            </select>
            
            <label for="salle">Choissisez votre salle :</label>
            <select name="salle"> 
                <?php
                    foreach ($salles as $salle) {
                        echo '<option value="' . $salle->getId() .'">' . $salle->getAdresse() . ' ' . $salle->getVille() . '</option>';
                    }
                ?>
            </select>
            
            <fieldset name="cours" multiple> 
                <legend for="cours">Choissisez vos cours :</legend>
                <?php
                    foreach ($cours as $cours) {
                        echo '<div><input type="checkbox" name="cours[]" value="' . $cours->getId() .'">' . '<label for="cours">' . $cours->getType() . '</label></div>';
                    }
                ?>
            </fieldset>

            <input type="submit" value="Modifier">
        </form>
    </section>

<?php require "include/footer.php"; ?>