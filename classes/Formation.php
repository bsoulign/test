<?php

class Formation {
    
    public $id;
    public $nom;
    public $duree;
    
    public function Formation($nom='', $duree_jours='') {
        
        $this->setID(NULL);
        $this->setNom($nom);
        $this->setDuree($duree_jours);
        
    }
    
    public function Load($id) {
        
        global $db;
        
        $this->Formation();
        
        try {           
        
        //$db->beginTransaction();
        
        $stmt = $db->query("SELECT * from formations where id=".($id)."");
        $tab=$stmt->fetchAll();
        
        foreach($tab as $t) {
            
            $this->setID($id);
            $this->setNom($t['intitule']);
            $this->setDuree($t['duree_jours']);
            
        }
        
        //$db->commit();

        } catch (PDOException $e) {
            //$db->rollBack();
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        
    }
    
    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function setDuree($duree_jours) {
        $this->duree = $duree_jours;
    }
    
    public function getNom() {
        return $this->nom;
    }
    
    public function setID($id) {
        $this->id = $id;
    }
    
    public function getID() {
        return $this->id;
    }
    
    public function getDuree() {
        return $this->duree;
    }
    
    public function Add() {
        array_push($_SESSION['formations'], $this);
        if(MySQL) {
            global $db;
            
            try {  
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $db->beginTransaction();

                $db->exec("INSERT INTO `formations` (`id`, `intitule`, `duree_jours`) VALUES (NULL, '".addslashes($this->getNom())."', '".addslashes($this->getDuree())."');");
            

                $db->commit();

            } catch (Exception $e) {
                $db->rollBack();
                echo "Failed: " . $e->getMessage();
            }
        }
    }
    
    public function Delete() {
        global $db;
        //echo "delete * from `eleves` where `id`=".addslashes($this->getID()).""; exit;
        if($this->getID()>0) {
            try {  
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $db->beginTransaction();
                $db->exec("delete from `formations` where `id`=".addslashes($this->getID())."");
                
                $db->commit();

            } catch (Exception $e) {
                $db->rollBack();
                echo "Failed: " . $e->getMessage();
            }
        }
    }
    
    public function Update() {
        global $db;
        //echo "delete * from `eleves` where `id`=".addslashes($this->getID()).""; exit;
        if($this->getID()>0) {
            try {  
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $db->beginTransaction();
                
                $db->exec("UPDATE `formations` SET `duree_jours`='".addslashes($this->getDuree())."', `intitule`='".addslashes($this->getNom())."' WHERE `id`='".addslashes($this->getID())."';");
                
                //$db->exec("update from `formations` where `id`=".addslashes($this->getID())."");
                
                $db->commit();

            } catch (Exception $e) {
                $db->rollBack();
                echo "Failed: " . $e->getMessage();
            }
        }
    }
    
}
?>