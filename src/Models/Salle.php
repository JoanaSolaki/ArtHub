<?php

Class Salle {
    private $id;
    private $adresse;
    private $ville;

    public function getId () {
        return $this->id;
    }

    public function getAdresse () {
        return $this->adresse;
    }
    
    public function setAdresse ($adresse) {
        $this->adresse = $adresse;
    }

    public function getVille () {
        return $this->ville;
    }
    
    public function setVille ($ville) {
        $this->ville = $ville;
    }
}