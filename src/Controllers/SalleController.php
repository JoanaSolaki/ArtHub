<?php

class SalleController extends Database {

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