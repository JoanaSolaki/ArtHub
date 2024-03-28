<?php
    require_once __DIR__ . "/../Services/Response.php";

    class ProfesseursController {
        use Response;
        function index () {
            $titre = 'Réservation';

            $professeurRepository = new ProfesseurRepository();
            $coursRepository = new CoursRepository();
            $salleRepository = new SalleRepository();

            $professeurs = $professeurRepository->selectAll();
            $cours = $coursRepository->selectAll();
            $salles = $salleRepository->selectAll();

            $viewData = [
                'titre' => $titre,
                'professeurs' => $professeurs,
                'cours' => $cours,
                'salles' => $salles
            ];
            
            $this->render("Reservation", $viewData);
        }

        function reserver ($date, $heure, $id, $professeur, $salle) {
            $reservationRepository = new ReservationRepository();

            $reservationRepository->create($date, $heure, $id, $professeur, $salle);

            header('Location: /profil');
        }
    }
?>