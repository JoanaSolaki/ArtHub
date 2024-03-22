<?php

class Utilisateur {
    private $id;
    private $nom;
    private $prenom;
    private $mdp;
    private $mail;

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

    public function getMDP () {
        return $this->mdp;
    }

    public function setMDP ($mdp) {
        $this->mdp = $mdp;
    }

    public function getMail () {
        return $this->mail;
    }

    public function setMail ($mail) {
        $this->mail = $mail;
    }
}