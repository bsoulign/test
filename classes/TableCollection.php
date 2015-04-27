<?php

class TableCollection {
    
    public $collection;
    
    public function TableCollection() {
        
        $this->collection=array();
        
    }
    
    public function SetCollection($univers='', $type_collection='', $filters=array(), $orders=array()) {
        
        global $db;
        
        $req = '';
        
        switch($univers) {
            case 'ELEVES':
                switch($type_collection) {
                    case 'ALL':
                        
                      $req = "SELECT * from eleves where 1";  
                        
                    break;
                }
            break;
        }
        
        //traitement à venir avec les filtres et les tris...
        
        //fin des traitement
        
        if($req!='') {
            try {

                $stmt = $db->query( $req );
                $tab=$stmt->fetchAll();
                
                $this->collection = $tab;
                /*
                foreach($tab as $t) {
                    //print_r( $t ); exit;
                    array_push($this->collection, $t);
                }
                */
            } catch (PDOException $e) {
                print "Erreur !: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        
    }
    
    public function GetCollection() {
        
        return $this->collection;
        
    }
    
}
?>