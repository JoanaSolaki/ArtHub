<?php
    require_once __DIR__ . "/../Services/Response.php";

    class ConnexionController {
        use Response;
        function index () {
            $titre = "Se connecter";
            $viewData = [
                'titre' => $titre
            ];
            $this->render("Connexion", $viewData);
        }
    }

?>