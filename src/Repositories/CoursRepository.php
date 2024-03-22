<?php

class CoursRepository extends Database {

    public function selectAll() {
        $requete = $this->getDb()->query('SELECT * FROM cours');

        $data = $requete->fetchAll(PDO::FETCH_CLASS, Cours::class);

        $requete->closeCursor();

        return $data;
    }

    public function selectById ($coursId) {
        $requete = $this->getDb()->prepare('SELECT * FROM cours WHERE id = :id');

        $requete->execute([
            "id" => $coursId
        ]);
        
        $data = $requete->setFetchMode(PDO::FETCH_CLASS, Cours::class);

        $data = $requete->fetch();

        $requete->closeCursor();

        return $data;   
    }
}
