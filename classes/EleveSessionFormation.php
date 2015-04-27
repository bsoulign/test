<?php

class EleveSessionFormation {
    
    public $id;
    public $session_formation;
    public $eleve;
    
    public function EleveSessionFormation($session_formation_id='', $eleve_id='') {
       
        $session_formation= new SessionFormation();
        
        if($session_formation_id!='') {
            $session_formation->Load($session_formation_id);
            $this->setSessionFormation($session_formation);
        }
        
        $eleve= new Eleve();
        if($eleve_id!='') {
            $eleve->Load($eleve_id);
            $this->setEleve($eleve);
        }
        
    }
    
    public function Load($id) {
        
        global $db;
        
        $this->EleveSessionFormation();
        
        try {           
        
        //$db->beginTransaction();
        
        $stmt = $db->query("SELECT * from `inscriptions_session_eleves` where ie_id=".($id)."");
        $tab=$stmt->fetchAll();
        //$tab = $stmt->execute();
        
        //var_dump( $tab );
        
        //var_dump( $tab );
        
        foreach($tab as $t) {
            
            $this->setID($id);
            
            $session_formation= new SessionFormation();
            $session_formation->Load($t['session_id']);

            $this->setSessionFormation($session_formation);

            $eleve= new Eleve();
            $eleve->Load($t['eleve_id']);

            $this->setEleve($eleve);
            
            /*
            $this->setFormation( new Formation($t['formation']) );
            $this->setDateDebut($t['date_debut']);
            $this->setDateFin($t['date_fin']);*/
            
        }
        
        //$db->commit();
        //$db = null;

        } catch (PDOException $e) {
            //$db->rollBack();
            //$db = null;
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        
    }
    
    public function setSessionFormation($session_formation) {
        $this->session_formation = $session_formation;
    }
    
    public function setEleve($eleve) {
        $this->eleve = $eleve;
    }
    
    public function getSessionFormation() {
        return $this->session_formation;
    }
    
    public function getEleve() {
        return $this->eleve;
    }
    
    public function setID($id) {
        $this->id = $id;
    }
    
    public function getID() {
        return $this->id;
    }
    
    public function Add() {
        
        array_push($_SESSION['InscriptionSessionsEleves'], $this);
        if(MySQL) {
            global $db;
            /*
            echo "INSERT INTO `inscriptions_session_eleves` (`ie_id`, `session_id`, `eleve_id`, `date_inscription`) VALUES (NULL, '1', '20/04/2015', NOW()); ";
            */
            try {  
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $db->beginTransaction();
                
                
                
                $db->exec("INSERT INTO `inscriptions_session_eleves` (`ie_id`, `session_id`, `eleve_id`, `date_inscription`) VALUES (NULL, '".addslashes($this->getSessionFormation()->getID())."', '".addslashes($this->getEleve()->getID())."', NOW()); ");
            

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
                $db->exec("delete from `inscriptions_session_eleves` where `ie_id`=".addslashes($this->getID())."");
                
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
                
                $this->session_formation = new SessionFormation();
                $this->session_formation->Load($_POST["session_formation_index"]);
                
                $this->eleve = new Eleve();
                $this->eleve->Load($_POST["eleve_index"]);
                
                $db->exec("UPDATE `inscriptions_session_eleves` SET `eleve_id`='".addslashes($this->getEleve()->getID())."', `session_id`='".addslashes($this->getSessionFormation()->getID())."' WHERE `ie_id`='".addslashes($this->getID())."';");
                
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