<?php
/*
if(isset($_POST['btn_inscription_session_formation'])) {
 
    
    $s = new EleveSessionFormation($_POST['session_formation_index'], $_POST['eleve_index']);
    $s->Add();   
    
    echo "<br><br>Eleve ajoute a la session de formation !<br><br>";
    
}
*/
try {
    
    $tab = $db->query('SELECT s.*, f.intitule as NomFormation from sessions_formations s, formations f where f.id=s.formation');

?>
<form name="f_inscription_session_formation" method="post" action="./?act=ADD_INSCRIPTION_ELEVE_SESSION_FORMATION">
    <div class="form-group">
        <label for="session_formation_index">Session</label> <select name="session_formation_index" id="session_formation_index" class="form-control">
        
        <?php foreach($tab as $s) { ?>
        <option value="<?=$s['sf_id'];?>"><?=$s['NomFormation']." (du ".$s['date_debut']." au ".$s['date_fin'].")";?></option>
        <?php } ?>
        
        
    </select>
    </div>
    <?php
    $tab_eleves = $db->query('SELECT * from eleves');
    ?>
    <div class="form-group">
        <label for="eleve_index">Eleve</label> <select name="eleve_index" id="eleve_index" class="form-control">
        
        <?php foreach($tab_eleves as $e) { ?>
        <option value="<?=$e['id'];?>"><?=$e['prenom']." ".$e['nom'];?></option>
        <?php } ?>
    </select>
    </div>
    <input type="submit" name="btn_inscription_session_formation_eleve" id="btn_inscription_session_formation_eleve" value="Enregistrer l'eleve a une session de formation !" class="btn btn-lg btn-default">
</form>
<?php


    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }
?>