<?php


try {
    
    $tab = $db->query("SELECT * from formations where id='".$_GET['formation_id']."'");
    
    foreach($tab as $f) {



?>
<form name="f_inscription_formation" method="post" action="./?act=UPDATE_FORMATION&formation_id=<?=$f['id'];?>">
    <div class="form-group">
        Nom <input type="text" name="nom" id="nom" value="<?=$f['intitule'];?>" class="form-control">
    </div>
    <div class="form-group">
    Duree <input type="text" name="duree" id="duree" value="<?=$f['duree_jours'];?>" class="form-control">
    </div>
    <input type="submit" name="btn_inscription_formation" id="btn_inscription_formation" value="Mettre à jour la formation !" class="btn btn-lg btn-default">
</form>
<?php
    
    }
    
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>