<?php
    require_once __DIR__ . "/../Services/Response.php";

    class AccueilController {
        use Response;
        function index () {
            $titre = 'ArtHub';

            $professeurRepository = new ProfesseurRepository();
            $professeurs = $professeurRepository->selectAll();

            $viewData = [
                'titre' => $titre,
                'professeurs' => $professeurs
            ];
            
            $this->render("Accueil", $viewData);
        }

        function pageNotFound () { 
            $titre = '404 - ArtHub';
            $viewData = [
                'titre' => $titre
            ];
            $this->render("404", $viewData);
        }

        function deconnexion () {
            $this->render("Deconnexion");
        }
    }
?>