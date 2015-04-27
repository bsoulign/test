<?php

class Animateur extends Personne {
    
    public function Animateur($nom='', $prenom='') {
        
        $this->setNom($nom);
        $this->setPrenom($prenom);
        
    }
    
    public function Load($id) {
        
        global $db;
        
        $this->Animateur();
        
        try {           
        
        //$db->beginTransaction();
        
        $stmt = $db->query("SELECT * from animateurs where id=".($id)."");
        $tab=$stmt->fetchAll();
        //$tab = $stmt->execute();
        
        //var_dump( $tab );
        
        //var_dump( $tab );
        
        foreach($tab as $t) {
            
            $this->setID($id);
            $this->setNom($t['nom']);
            $this->setPrenom($t['prenom']);
            
        }
        
        //$db->commit();

        } catch (PDOException $e) {
            //$db->rollBack();
            print "Erreur !: " . $e->getMessage() . "<br/>";
            die();
        }
        
    }
    
    public function Add() {
        array_push($_SESSION['animateurs'], $this);
        if(MySQL) {
            
            global $db;
            
            try {  
                $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

                $db->beginTransaction();

                $db->exec("INSERT INTO `animateurs` (`id`, `nom`, `prenom`) VALUES (NULL, '".addslashes($this->getNom())."', '".addslashes($this->getPrenom())."');");

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
                $db->exec("delete from `animateurs` where `id`=".addslashes($this->getID())."");
                
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
                
                $db->exec("UPDATE `animateurs` SET `nom`='".addslashes($this->getNom())."', `prenom`='".addslashes($this->getPrenom())."' WHERE `id`='".addslashes($this->getID())."';");
                
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