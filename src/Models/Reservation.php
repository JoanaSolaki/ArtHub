<?php

Class Reservation {
    private $id;
    private $date;
    private $heure;
    private $utilisateur_id;
    private $professeur_id;
    private $salle_id;

    public function getId () {
        return $this->id;
    }

    public function getDate () {
        return $this->date;
    }
    
    public function setDate ($date) {
        $this->date = $date;
    }

    public function getHeure () {
        return $this->heure;
    }
    
    public function setHeure ($heure) {
        $this->heure = $heure;
    }

    public function getUtilisateurId () {
        return $this->utilisateur_id;
    }
    
    public function setUtilisateurId ($utilisateur_id) {
        $this->utilisateur_id = $utilisateur_id;
    }

    public function getProfesseurId () {
        return $this->professeur_id;
    }
    
    public function setProfesseurId ($professeur_id) {
        $this->professeur_id = $professeur_id;
    }

    public function getSalleId () {
        return $this->salle_id;
    }
    
    public function setSalleId ($salle_id) {
        $this->salle_id = $salle_id;
    }
}