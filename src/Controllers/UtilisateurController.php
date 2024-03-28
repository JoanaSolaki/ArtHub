<?php
    require_once __DIR__ . "/../Services/Response.php";

    class UtilisateurController {
        use Response;

        function index () {
            $utilisateurRepository = new UtilisateurRepository();
            $reservationRepository = new ReservationRepository();
            $professeurRepository = new ProfesseurRepository();
            $salleRepository = new SalleRepository();

            $id = $_SESSION ['utilisateurId'];

            $utilisateur = $utilisateurRepository->selectById($id);

            $reservations = $reservationRepository->selectByUtilisateurId($id);

            $reservationAll = [];

            foreach ($reservations as $reservation) {
                $profReserver = $reservation->getProfesseurId();
                $professeur = $professeurRepository->selectById($profReserver);
                
                $salleReserver = $reservation->getSalleId();
                $salle = $salleRepository->selectById($salleReserver);
        
                $reservationAll[] = [
                    'reservation' => $reservation,
                    'professeur' => $professeur,
                    'salle' => $salle
                ];
            }

            $titre = 'Profil - ArtHub';

            $viewData = [
                'titre' => $titre,
                'utilisateur' => $utilisateur,
                'reservationsAll' => $reservationAll
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

        function indexSinscrire () {
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
    
        function indexConnexion () {
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

        function indexModifier () {
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