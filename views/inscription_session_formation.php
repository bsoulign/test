<?php
/*if(isset($_POST['btn_inscription_session_formation'])) {
    
    $s = new SessionFormation($_POST['formation_id'], $_POST['date_debut'], $_POST['date_fin']);
    $s->Add();   
    
    echo "<br><br>Session de formation ajoutee !<br><br>";
    
}
*/
try {
    
    $tab = $db->query('SELECT * from formations');

    ?>
    <form name="f_inscription_session_formation" method="post" action="./?act=ADD_SESSION_FORMATION">
        <div class="form-group">
            <label for="formation_id">Formation</label> <select name="formation_id" id="formation_id" class="form-control">
            <?php foreach($tab as $f) { ?>
            <option value="<?=$f['id'];?>"><?=$f['intitule'];?></option>
            <?php } ?>
        </select>
        </div>
        <div class="form-group">
            <label for="date_debut">Du</label> <input type="text" name="date_debut" id="date_debut" value="" class="form-control">
        </div>
        <div class="form-group">
            <label for="date_fin">Au</label> <input type="text" name="date_fin" id="date_fin" value="" class="form-control">
        </div>
        <?php
        $tab_animateurs = $db->query('SELECT * from animateurs');
        ?>
        <div class="form-group">
            <label for="animateur_id">Formation</label> <select name="animateur_id" id="animateur_id" class="form-control">
            <?php foreach($tab_animateurs as $a) { ?>
            <option value="<?=$a['id'];?>"><?=$a['prenom']." ".$a['nom'];?></option>
            <?php } ?>
        </select>
        </div>
        <input type="submit" name="btn_inscription_session_formation" id="btn_inscription_session_formation" value="Enregistrer la session de formation !" class="btn btn-lg btn-default">
    </form>
    <?php
    
    //}

    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

?>