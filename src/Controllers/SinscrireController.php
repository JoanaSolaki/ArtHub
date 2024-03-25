<?php
    require_once __DIR__ . "/../Services/Response.php";

    class SinscrireController {
        use Response;
        function index () {
            $titre = "S'inscrire";
            $viewData = [
                'titre' => $titre
            ];
            $this->render("Sinscrire", $viewData);
        }
        function sinscrire($nom, $prenom, $mdp, $mail) {
            $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

            $newUtilisateur = new UtilisateurRepository();

            $newUtilisateurId = $newUtilisateur->create($nom, $prenom, $mdpHash, $mail);

            $_SESSION ['utilisateurId'] = $newUtilisateurId;

            header("Location: /profil");
        }
    }

?>