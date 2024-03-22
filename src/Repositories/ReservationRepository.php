<?php

class ReservationRepository extends Database {

    public function selectAll() {
        $requete = $this->getDb()->query('SELECT * FROM reservation');

        $data = $requete->fetchAll(PDO::FETCH_CLASS, Reservation::class);

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

    public function create ($newDate, $newHeure, $newUtilisateurId, $newProfesseurId, $newSalleId) {
        $requete = $this->getDb()->prepare("INSERT INTO reservation (date, heure, utilisateur_id, professeur_id, salle_id) VALUE (:date, :heure, :utilisateur_id, :professeur_id, :salle_id)");

        $requete->execute([
            "date" => $newDate,
            "heure" => $newHeure,
            "utilisateur_id" => $newUtilisateurId,
            "professeur_id" => $newProfesseurId,
            "salle_id" => $newSalleId
        ]);

        echo "<p>La réservation à bien été ajouté !</p>";

        $requete->closeCursor();
    }

    public function update ($date, $heure, $utiltisateurId, $professeurId, $salleId, $reservationId) {
        $query = 'UPDATE reservation 
                SET name = date, heure, utilisateur_id, professeur_id, salle_id
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

        echo "<p>Les données ont été modifiées.</p>";
        
        $requete->closeCursor();
    }

    public function delete ($reservationId) {
        $requete = $this->getDb()->prepare("DELETE FROM reservation WHERE id= :id");

        $requete->execute([
            "id" => $reservationId
        ]);

        echo "<p>Les données ont été supprimés.</p>";
        
        $requete->closeCursor();
    }
}
