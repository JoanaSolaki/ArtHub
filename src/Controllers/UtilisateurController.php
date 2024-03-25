<?php
    require_once __DIR__ . "/../Services/Response.php";

    class UtilisateurController {
        use Response;

        function index () {
            $utilisateurRepository = new UtilisateurRepository();

            $id = $_GET['id'];

            $utilisateur = $utilisateurRepository->selectById($id);

            $viewData = [
                'nom' => $utilisateur,
                'prenom' => $utilisateur,
                'mail' => $utilisateur
            ];

            $this->render("Profil", $viewData);
        }
    }
?>