<?php

class SalleRepository extends Database {

    public function selectAll() {
        $requete = $this->getDb()->query('SELECT * FROM salle');

        $data = $requete->fetchAll(PDO::FETCH_CLASS, Salle::class);

        $requete->closeCursor();

        return $data;
    }

    public function selectById ($salleId) {
        $requete = $this->getDb()->prepare('SELECT * FROM salle WHERE id = :id');

        $requete->execute([
            "id" => $salleId
        ]);
        
        $data = $requete->setFetchMode(PDO::FETCH_CLASS, Salle::class);

        $data = $requete->fetch();

        $requete->closeCursor();

        return $data;   
    }
}
