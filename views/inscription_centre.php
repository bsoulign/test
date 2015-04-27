<?php
/*if(isset($_POST['btn_inscription_animateur'])) {
    
    $e = new Animateur($_POST['nom'], $_POST['prenom']);
    $e->Add();   
    
    echo "<br><br>Animateur ajoute !<br><br>";
    
}*/
?>
<form name="f_inscription_centre" method="post" action="./?act=ADD_CENTRE">
    <div class="form-group">
        <label for="nom">Nom</label> <input type="text" name="nom" id="nom" value="" class="form-control">
    </div>
    <input type="submit" name="btn_inscription_centre" id="btn_inscription_centre" value="Enregistrer le centre de formation !" class="btn btn-lg btn-default">
</form>
<?

?>