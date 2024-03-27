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

        function supprimer () {
            $titre = 'Suppression';

            $viewData = [
                'titre' => $titre,
            ];

            $this->render("Supprimer", $viewData);
        }

        function delete () {
            $utilisateurRepository = new UtilisateurRepository();

            $id = $_SESSION ['utilisateurId'];
            
            $utilisateurRepository->delete($id);
            
            session_destroy();

            header('Location: /');
        }
    }
?>