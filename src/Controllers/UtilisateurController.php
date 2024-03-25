<?php
    require_once __DIR__ . "/../Services/Response.php";

    class UtilisateurController {
        use Response;

        function index () {
            $utilisateurRepository = new UtilisateurRepository();

            $id = $_SESSION ['utilisateurId'];

            $utilisateur = $utilisateurRepository->selectById($id);

            $titre = 'Profil - ArtHub';

            $viewData = [
                'titre' => $titre,
                'utilisateur' => $utilisateur
            ];


            $this->render("Profil", $viewData);
        }
    }
?>