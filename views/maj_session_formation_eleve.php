<?php

try {
    
    $tab_inscription_eleve = $db->query("SELECT * from inscriptions_session_eleves where ie_id='".$_GET['session_formation_eleve_id']."'");
    
    foreach($tab_inscription_eleve as $i) {
    
    
    $tab = $db->query('SELECT s.*, f.intitule as NomFormation from sessions_formations s, formations f where f.id=s.formation');

?>
<form name="f_inscription_session_formation" method="post" action="./?act=UPDATE_INSCRIPTION_ELEVE_SESSION_FORMATION&session_formation_eleve_id=<?=$i['ie_id'];?>">
    <div class="form-group">
        <label for="session_formation_index">Session</label> <select name="session_formation_index" id="session_formation_index" class="form-control">
        
        <?php foreach($tab as $s) { ?>
        <option value="<?=$s['sf_id'];?>" <?php
            if($i['session_id'] == $s['sf_id']) { ?> selected="selected"<?php }
            ?>><?=$s['NomFormation']." (du ".$s['date_debut']." au ".$s['date_fin'].")";?></option>
        <?php } ?>
        
        
    </select>
    </div>
    <?php
    $tab_eleves = $db->query('SELECT * from eleves');
    ?>
    <div class="form-group">
        <label for="eleve_index">Eleve</label> <select name="eleve_index" id="eleve_index" class="form-control">
        
        <?php foreach($tab_eleves as $e) { ?>
        <option value="<?=$e['id'];?>" <?php
            if($i['eleve_id'] == $e['id']) { ?> selected="selected"<?php }
            ?>><?=$e['prenom']." ".$e['nom'];?></option>
        <?php } ?>
    </select>
    </div>
    <input type="submit" name="btn_inscription_session_formation_eleve" id="btn_inscription_session_formation_eleve" value="Enregistrer l'eleve a une session de formation !" class="btn btn-lg btn-default">
</form>
<?php
    
    }

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>