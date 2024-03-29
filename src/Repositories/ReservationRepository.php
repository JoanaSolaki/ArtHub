<?php

class ReservationRepository extends Database {

    public function selectAll() {
        $requete = $this->getDb()->query('SELECT * FROM reservation');

        $data = $requete->fetchAll(PDO::FETCH_CLASS, Reservation::class);

        $requete->closeCursor();

        return $data;
    }

    public function selectByUtilisateurId ($utilisateurId) {
        $requete = $this->getDb()->prepare('SELECT * FROM reservation WHERE utilisateur_id = :id');

        $requete->execute([
            "id" => $utilisateurId
        ]);
        
        $data = $requete->setFetchMode(PDO::FETCH_CLASS, Reservation::class);

        $data = $requete->fetchAll();

        $requete->closeCursor();

        return $data;   
    }

    public function selectById ($reservationId) {
        $requete = $this->getDb()->prepare('SELECT * FROM reservation WHERE id = :id');

        $requete->execute([
            "id" => $reservationId
        ]);
        
        $data = $requete->setFetchMode(PDO::FETCH_CLASS, Reservation::class);

        $data = $requete->fetch();

        $requete->closeCursor();

        return $data;   
    }

    // public function selectJoin ($utilisateurId) {
    //     $requete = $this->getDb()->prepare('SELECT reservation.*, professeur.*, salle.* FROM reservation JOIN professeur on reservation.professeur_id = professeur.id JOIN salle on reservation.salle_id = salle.id WHERE utilisateur_id = :id');

    //     $requete->execute([
    //         "id" => $utilisateurId
    //     ]);

    //     $data = $requete->setFetchMode(PDO::FETCH_ASSOC);

    //     $data = $requete->fetchAll();

    //     $requete->closeCursor();

    //     return $data;  
    // }

    public function create ($newDate, $newHeure, $newUtilisateurId, $newProfesseurId, $newSalleId, $newCours) {
        $requete = $this->getDb()->prepare("INSERT INTO reservation (date, heure, utilisateur_id, professeur_id, salle_id) VALUE (:date, :heure, :utilisateur_id, :professeur_id, :salle_id)");

        $requete->execute([
            "date" => $newDate,
            "heure" => $newHeure,
            "utilisateur_id" => $newUtilisateurId,
            "professeur_id" => $newProfesseurId,
            "salle_id" => $newSalleId
        ]);

        $reservationId = $this->getDb()->lastInsertId();

        foreach($newCours as $cour) {
            $requeteCours = $this->getDb()->prepare("INSERT INTO reservation_cours (reservation_id, cours_id) VALUE (:reservation_id, :cours_id)");

            $requeteCours->execute([
                "reservation_id" => $reservationId,
                "cours_id" => $cour
            ]);
        }
        $requete->closeCursor();
    }

    public function update ($date, $heure, $utiltisateurId, $professeurId, $salleId, $reservationId) {
        $query = 'UPDATE reservation 
                SET date = :date, heure = :heure, utilisateur_id = :utilisateur_id, professeur_id = :professeur_id, salle_id = :salle_id
                WHERE id= :id';

        $requete = $this->getDb()->prepare($query);

        $requete->execute([
            "date" => $date,
            "heure" => $heure,
            "utilisateur_id" => $utiltisateurId,
            "professeur_id" => $professeurId,
            "salle_id" => $salleId,
            "id" => $reservationId
        ]);

        $requete->closeCursor();
    }

    public function delete ($reservationId) {
        $requete = $this->getDb()->prepare("DELETE FROM reservation WHERE id= :id");

        $requete->execute([
            "id" => $reservationId
        ]);

        $requete->closeCursor();
    }
}
