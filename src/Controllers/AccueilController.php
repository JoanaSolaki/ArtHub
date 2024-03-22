<?php
    require_once __DIR__ . "/../Services/Response.php";

    class AccueilController {
        use Response;
        function index () {
            $this->render("Accueil");
        }

        function pageNotFound () {
            $this->render("404");
        }
    }
?>