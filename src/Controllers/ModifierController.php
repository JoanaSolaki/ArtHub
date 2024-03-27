<?php
    require_once __DIR__ . "/../Services/Response.php";

    class ModifierController {
        use Response;
        function index () {
            $titre = "Modifier";

            $currentUtilisateur = new UtilisateurRepository();

            $currentUtilisateur->selectById($_SESSION['utilisateurId']);

            $viewData = [
                'titre' => $titre,
                'utilisateur' => $currentUtilisateur
            ];

            $this->render("Modifier", $viewData);
        }

        function modifier($nom, $prenom, $mdp, $mail, $id) {
            $mdpHash = password_hash($mdp, PASSWORD_DEFAULT);

            $newUtilisateur = new UtilisateurRepository();

            $newUtilisateur->update($nom, $prenom, $mdpHash, $mail, $id);

            header("Location: /profil");
        }
    }

?>