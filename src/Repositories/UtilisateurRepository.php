<?php

class UtilisateurRepository extends Database {

    public function selectAll() {
        $requete = $this->getDb()->query('SELECT * FROM utilisateur');

        $data = $requete->fetchAll(PDO::FETCH_CLASS, Utilisateur::class);

        $requete->closeCursor();

        return $data;
    }

    public function selectAllMail() {
        $requete = $this->getDb()->query('SELECT mail FROM utilisateur');

        $data = $requete->fetchAll(PDO::FETCH_CLASS, Utilisateur::class);

        $requete->closeCursor();

        return $data;
    }

    public function selectUserByMail($mail) {
        $requete = $this->getDb()->prepare('SELECT * FROM utilisateur WHERE mail = :mail');

        $requete->execute([
            "mail" => $mail
        ]);

        $data = $requete->fetch();

        $requete->closeCursor();

        return $data;
    }

    public function selectById ($utilisateurId) {
        $requete = $this->getDb()->prepare('SELECT * FROM utilisateur WHERE id = :id');

        $requete->execute([
            "id" => $utilisateurId
        ]);
        
        $data = $requete->setFetchMode(PDO::FETCH_CLASS, Utilisateur::class);

        $data = $requete->fetch();

        $requete->closeCursor();

        return $data;   
    }

    public function create ($newNom, $newPrenom, $newMdp, $newMail) {
        $requete = $this->getDb()->prepare("INSERT INTO utilisateur (nom, prenom, mdp, mail) VALUE (:nom, :prenom, :mdp, :mail)");

        $requete->execute([
            "nom" => $newNom,
            "prenom" => $newPrenom,
            "mdp" => $newMdp,
            "mail" => $newMail
        ]);

        $id = $this->getDb()->lastInsertId();

        $requete->closeCursor();

        return $id;
    }

    public function update ($nom, $prenom, $mdp, $mail, $utilisateurId) {
        $query = 'UPDATE utilisateur 
                SET nom = :nom, prenom = :prenom, mdp = :mdp, mail = :mail
                WHERE id= :id';

        $requete = $this->getDb()->prepare($query);

        $requete->execute([
            "nom" => $nom,
            "prenom" => $prenom,
            "mdp" => $mdp,
            "mail" => $mail,
            "id" => $utilisateurId
        ]);

        echo "<p>Les données ont été modifiées.</p>";
        
        $requete->closeCursor();
    }

    public function delete ($utilisateurId) {
        $requete = $this->getDb()->prepare("DELETE FROM utilisateur WHERE id= :id");

        $requete->execute([
            "id" => $utilisateurId
        ]);

        echo "<p>Les données ont été supprimés.</p>";
        
        $requete->closeCursor();
    }
}