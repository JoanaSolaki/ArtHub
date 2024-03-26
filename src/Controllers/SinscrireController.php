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
                        
            $newMail = $mail;
            $users = $newUtilisateur->selectAllMail();
            
            $emailExiste = false;
            foreach ($users as $user) {
                if($user->getMail() === $newMail) {
                    $emailExiste = true;
                    break;
                }
            }

            if ($emailExiste == true) {
                $titre = "Erreur inscription";
                $viewData = [
                    'titre' => $titre
                ];
                $this->render("ErreurInscription", $viewData);
            } else {
                $newUtilisateurId = $newUtilisateur->create($nom, $prenom, $mdpHash, $newMail);
                $_SESSION['utilisateurId'] = $newUtilisateurId;
                header("Location: /profil");
            }

        }
    }

?>