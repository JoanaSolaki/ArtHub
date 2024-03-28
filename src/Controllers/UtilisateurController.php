<?php
    require_once __DIR__ . "/../Services/Response.php";

    class UtilisateurController {
        use Response;

        
        function debug($var, $exit = true)
        {
            echo '<pre>';
            var_dump($var);
            echo '</pre>';

            if ($exit) {
                exit;
            };
        }

        function index () {
            $utilisateurRepository = new UtilisateurRepository();
            $reservationRepository = new ReservationRepository();
            $professeurRepository = new ProfesseurRepository();
            $salleRepository = new SalleRepository();

            $id = $_SESSION ['utilisateurId'];

            $utilisateur = $utilisateurRepository->selectById($id);

            $reservations = $reservationRepository->selectByUtilisateurId($id);

            // $reservationProf = [];

            // $reservationSalle = [];

            $reservationAll = [];

            foreach ($reservations as $reservation) {
                $profReserver = $reservation->getProfesseurId();
                $professeur = $professeurRepository->selectById($profReserver);
                
                $salleReserver = $reservation->getSalleId();
                $salle = $salleRepository->selectById($salleReserver);
        
                // Ajouter les informations de la réservation, du professeur et de la salle dans le tableau $reservationAll
                $reservationAll[] = [
                    'reservation' => $reservation,
                    'professeur' => $professeur,
                    'salle' => $salle
                ];
            }

            // foreach ($reservations as $reservation) {
            //     $profReserver = $reservation->getProfesseurId();
            //     $professeurs = $professeurRepository->selectById($profReserver);
            //     $reservationProf[$reservation->getId()] = $professeurs;
            // }

            // foreach ($reservations as $reservation) {
            //     $salleReserver = $reservation->getSalleId();
            //     $salles = $salleRepository->selectById($salleReserver);
            //     $reservationSalle[$reservation->getId()] = $salles;
            // }

            $titre = 'Profil - ArtHub';

            $viewData = [
                'titre' => $titre,
                'utilisateur' => $utilisateur,
                'reservationsAll' => $reservationAll
                // 'reservations' => $reservations,
                // 'professeurs' => $reservationProf,
                // 'salles' => $reservationSalle
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