<?php

class ProfesseurRepository extends Database {

    public function selectAll() {
        $requete = $this->getDb()->query('SELECT * FROM professeur');

        $data = $requete->fetchAll(PDO::FETCH_CLASS, Professeur::class);

        $requete->closeCursor();

        return $data;
    }

    public function selectById ($ProfesseurId) {
        $requete = $this->getDb()->prepare('SELECT * FROM professeur WHERE id = :id');

        $requete->execute([
            "id" => $ProfesseurId
        ]);
        
        $data = $requete->setFetchMode(PDO::FETCH_CLASS, Professeur::class);

        $data = $requete->fetch();

        $requete->closeCursor();

        return $data;   
    }
}
