<?php


class CentreFormation {
    
    public $id;
    public $nom;
    
    public function CentreFormation($nom) {
        
        $this->setNom($nom);
        
    }
    
    public function Load($id) {
        
        global $db;
        
        $this->CentreFormation();
        
        try {           
        
        //$db->beginTransaction();
        
        $stmt = $db->query("SELECT * from centres where id=".($id)."");
        $tab=$stmt->fetchAll();
        //$tab = $stmt->execute();
        
        //var_dump( $tab );
        
        //var_dump( $tab );
        
        foreach($tab as $t) {
            
            $this->setID($id);
            $this->setNom($t['nom']);
            
        }
        
        //$db->commit();

        } catch (PDOException $e) {
            //$db->rollBack();
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        
    }
    
    public function setID($id) {
        $this->id = $id;
    }
    
    public function getID() {
        return $this->id;
    }
    
    public function setNom($nom) {
        $this->nom = $nom;
    }
    
    public function getNom() {
        return $this->nom;
    }
    
    
    
    
    
    
    
    public function Add() {
        //array_push($_SESSION['animateurs'], $this);
        if(MySQL) {
            
            global $db;
            
            try {  
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $db->beginTransaction();

                $db->exec("INSERT INTO `centres` (`id`, `nom`) VALUES (NULL, '".addslashes($this->getNom())."');");

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
                $db->exec("delete from `centres` where `id`=".addslashes($this->getID())."");
                
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
                
                $db->exec("UPDATE `centres` SET `nom`='".addslashes($this->getNom())."' WHERE `id`='".addslashes($this->getID())."';");
                
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