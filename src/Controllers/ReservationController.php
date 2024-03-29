<?php
    require_once __DIR__ . "/../Services/Response.php";

    class ReservationController {
        use Response;

        function indexModifier () {
            $titre = "Modifier";

            $professeurRepository = new ProfesseurRepository();
            $coursRepository = new CoursRepository();
            $salleRepository = new SalleRepository();

            $professeurs = $professeurRepository->selectAll();
            $cours = $coursRepository->selectAll();
            $salles = $salleRepository->selectAll();

            $currentReservation = new ReservationRepository();

            $idReservation = $_SESSION['reservationId'];

            $currentReservation->selectById($idReservation);

            $viewData = [
                'titre' => $titre,
                'reservation' => $currentReservation,
                'professeurs' => $professeurs,
                'cours' => $cours,
                'salles' => $salles
            ];

            $this->render("ModifierReservation", $viewData);
        }

        function modifier($date, $heure, $utiltisateurId, $professeurId, $salleId, $reservationId) {

            $newReservation = new ReservationRepository();

            $newReservation->update($date, $heure, $utiltisateurId, $professeurId, $salleId, $reservationId);

            header("Location: /profil");
        }

        function delete () {
            $reservationRepository = new ReservationRepository();

            $id = $_GET['id'];
            
            $reservationRepository->delete($id);

            header('Location: /profil');
        }
    }
?>