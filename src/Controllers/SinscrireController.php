<?php
    require_once __DIR__ . "/../Services/Response.php";

    class SinscrireController {
        use Response;
        function index () {
            $this->render("Sinscrire");
        }
        function sinscrire($nom, $prenom, $mdp, $mail) {

            $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

            $newUtilisateur = new UtilisateurRepository();

            $newUtilisateur->create($nom, $prenom, $mdpHash, $mail);

            header('/Profil?id');
        }
    }

?>