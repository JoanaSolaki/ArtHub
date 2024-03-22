<?php

Class Cours {
    private $id;
    private $type;
    private $description;

    public function getId () {
        return $this->id;
    }

    public function getType () {
        return $this->type;
    }
    
    public function setType ($type) {
        $this->type = $type;
    }

    public function getDescription () {
        return $this->description;
    }
    
    public function setDescription ($description) {
        $this->description = $description;
    }
}