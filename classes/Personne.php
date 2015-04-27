<?php

class Personne {
    
    public $id;
    public $nom;
    public $prenom;
    
    public function Personne() {
        
        
        
    }
    
    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function setID($id) {
        $this->id = $id;
    }
    
    public function getID() {
        return $this->id;
    }
    
    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }
    
    public function getNom() {
        return $this->nom;
    }
    
    public function getPrenom() {
        return $this->prenom;
    }
    
}
?>