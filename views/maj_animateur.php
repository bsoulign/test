<?php
try {
    
     $tab = $db->query("SELECT * from animateurs where id='".$_GET['animateur_id']."'");
    
    foreach($tab as $e) {
        
?>
<form name="f_inscription_animateur" method="post" action="./?act=UPDATE_ANIMATEUR&animateur_id=<?=$e['id'];?>">
    <div class="form-group">
        <label for="nom">Nom</label> <input type="text" name="nom" id="nom" value="<?=$e['nom'];?>" class="form-control">
    </div>
    <div class="form-group">
        <label for="prenom">Prenom</label> <input type="text" name="prenom" id="prenom" value="<?=$e['prenom'];?>" class="form-control">
    </div>
    <input type="submit" name="btn_inscription_animateur" id="btn_inscription_eleve" value="Mettre à jour l'animateur !" class="btn btn-lg btn-default">
</form>
<?php
    
    }
    
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>