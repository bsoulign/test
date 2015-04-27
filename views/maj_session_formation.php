<?php
try {
    
    $tab_session = $db->query("SELECT * from sessions_formations where sf_id='".$_GET['session_formation_id']."'");
    
    foreach($tab_session as $s) {
    
    $tab = $db->query('SELECT * from formations');
    
    //foreach($tab as $f) {

    ?>
    <form name="f_inscription_session_formation" method="post" action="./?act=UPDATE_SESSION_FORMATION&session_formation_id=<?=$s['sf_id'];?>">
        <div class="form-group">
            <label for="formation_id">Formation</label> <select name="formation_id" id="formation_id" class="form-control">
            <?php foreach($tab as $f) { ?>
            <option value="<?=$f['id'];?>" <?php
            if($f['id'] == $s['formation']) { ?> selected="selected"<?php }
            ?>><?=$f['intitule'];?></option>
            <?php } ?>
        </select>
        </div>
        <div class="form-group">
            <label for="date_debut">Du</label> <input type="text" name="date_debut" id="date_debut" value="<?=$s['date_debut'];?>" class="form-control">
        </div>
        <div class="form-group">
            <label for="date_fin">Au</label> <input type="text" name="date_fin" id="date_fin" value="<?=$s['date_debut'];?>" class="form-control">
        </div>
        <?php
        $tab_animateurs = $db->query('SELECT * from animateurs');
        ?>
        <div class="form-group">
            <label for="animateur_id">Formation</label> <select name="animateur_id" id="animateur_id" class="form-control">
            <?php foreach($tab_animateurs as $a) { ?>
            <option value="<?=$a['id'];?>" <?php
            if($a['id'] == $s['animateur_id']) { ?> selected="selected"<?php }
            ?>><?=$a['prenom']." ".$a['nom'];?></option>
            <?php } ?>
        </select>
        </div>
        <input type="submit" name="btn_inscription_session_formation" id="btn_inscription_session_formation" value="Mettre à jour la session de formation !" class="btn btn-lg btn-default">
    </form>
    <?php
    
    //}
    
    }

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

?>