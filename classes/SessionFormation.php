<?php

class SessionFormation {
    
    public $id;
    public $animateur;
    public $formation;
    public $date_debut;
    public $date_fin;
    
    public function SessionFormation($formation_id='', $animateur_id='', $date_debut='', $date_fin='') {
        
        $formation= new Formation();
        if($formation_id!='') {
            $formation->Load($formation_id);
            $this->setFormation($formation);
        }
        
        $animateur= new Animateur();
        if($animateur_id!='') {
            $animateur->Load($animateur_id);
            $this->setAnimateur($animateur);
        }
        
        $this->setDateDebut($date_debut);
        $this->setDateFin($date_fin);
        
    }
    
    public function Load($id) {
        
        global $db;
        
        $this->SessionFormation();
        
        try {           
        
        //$db->beginTransaction();
        
        $stmt = $db->query("SELECT * from sessions_formations where sf_id=".($id)."");
        $tab=$stmt->fetchAll();
        //$tab = $stmt->execute();
        
        //var_dump( $tab );
        
        //var_dump( $tab );
        
        foreach($tab as $t) {
            
            $this->setID($id);
            $this->setFormation( new Formation($t['formation']) );
            $this->setAnimateur( new Animateur($t['animateur_id']) );
            $this->setDateDebut($t['date_debut']);
            $this->setDateFin($t['date_fin']);
            
        }
        
        //$db->commit();

        } catch (PDOException $e) {
            //$db->rollBack();
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        
    }
    
    public function setFormation($formation) {
        $this->formation = $formation;
    }
    
    public function setDateDebut($date_debut) {
        $this->date_debut = $date_debut;
    }
    
    public function setAnimateur($Animateur) {
        $this->animateur = $Animateur;
    }
    
    public function getAnimateur() {
        return $this->animateur;
    }
    
    public function setID($id) {
        $this->id = $id;
    }
    
    public function getID() {
        return $this->id;
    }
    
    public function setDateFin($date_fin) {
        $this->date_fin = $date_fin;
    }
    
    public function getFormation() {
        return $this->formation;
    }
    
    public function getDateDebut() {
        return $this->date_debut;
    }
    
    public function getDateFin() {
        return $this->date_fin;
    }
    
    public function Add() {
        array_push($_SESSION['sessionsFormations'], $this);
        if(MySQL) {
            global $db;
            
            try {  
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $db->beginTransaction();

                $db->exec("INSERT INTO `sessions_formations` (`sf_id`, `formation`, `date_debut`, `date_fin`, `animateur_id`) VALUES (NULL, '".addslashes($this->getFormation()->getID())."', '".addslashes($this->getDateDebut())."', '".addslashes($this->getDateFin())."', '".addslashes($this->getAnimateur()->getID())."'); ");
            

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
                $db->exec("delete from `sessions_formations` where `sf_id`=".addslashes($this->getID())."");
                
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
                
                $this->animateur = new Animateur();
                $this->animateur->Load($_POST["animateur_id"]);
                
                $this->formation = new Formation();
                $this->formation->Load($_POST["formation_id"]);
                
                $db->exec("UPDATE `sessions_formations` SET `date_debut`='".addslashes($this->getDateDebut())."', `date_fin`='".addslashes($this->getDateFin())."', `formation`='".addslashes($this->formation->getID())."', `animateur_id`='".addslashes($this->animateur->getID())."' WHERE `sf_id`='".addslashes($this->getID())."';");
                
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