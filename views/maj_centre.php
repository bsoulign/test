<?php
try {
    
     $tab = $db->query("SELECT * from centres where id='".$_GET['centre_id']."'");
    
    foreach($tab as $c) {
        
?>
<form name="f_inscription_centre" method="post" action="./?act=UPDATE_CENTRE&centre_id=<?=$c['id'];?>">
    <div class="form-group">
        <label for="nom">Nom</label> <input type="text" name="nom" id="nom" value="<?=$c['nom'];?>" class="form-control">
    </div>
    <input type="submit" name="btn_inscription_centre" id="btn_inscription_centre" value="Mettre à jour les informations du centre !" class="btn btn-lg btn-default">
</form>
<?php
    
    }
    
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>