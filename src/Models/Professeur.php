<?php

class Professeur {
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $description;
    private $prixHeure;
    private $ville;

    public function getId () {
        return $this->id;
    }

    public function getNom () {
        return $this->nom;
    }

    public function setNom ($nom) {
        $this->nom = $nom;
    }

    public function getPrenom () {
        return $this->prenom;
    }

    public function setPrenom ($prenom) {
        $this->prenom = $prenom;
    }

    public function getMail () {
        return $this->mail;
    }

    public function setMail ($mail) {
        $this->mail = $mail;
    }

    public function getDescription () {
        return $this->description;
    }

    public function setDescription ($description) {
        $this->description = $description;
    }

    public function getPrixHeure () {
        return $this->prixHeure;
    }

    public function setPrixHeure ($prixHeure) {
        $this->prixHeure = $prixHeure;
    }

    public function getVille () {
        return $this->ville;
    }

    public function setVille ($ville) {
        $this->ville = $ville;
    }
}