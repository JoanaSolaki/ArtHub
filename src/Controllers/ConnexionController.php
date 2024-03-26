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

        function connexion ($mail, $mdp) {

            $usersMail = new UtilisateurRepository();

            $identifiant = $usersMail->selectUserByMail($mail);

            if ($identifiant && password_verify($mdp, $identifiant['mdp'])) {
                session_start();
                $_SESSION['utilisateurId'] = $identifiant['id'];
                header('Location: /profil');
            } else {
                $titre = "Se connecter";
                $viewData = [
                    'titre' => $titre
                ];
                $this->render("ErreurConnexion", $viewData);;
            }
        }
    }

?>