<?php
/*if(isset($_POST['btn_inscription_formation'])) {
    
    $e = new Formation($_POST['nom'], $_POST['duree']);
    $e->Add();   
    
    echo "<br><br>Formation ajoutee !<br><br>";
    
}*/
?>
<form name="f_inscription_formation" method="post" action="./?act=ADD_FORMATION">
    <div class="form-group">
        Nom <input type="text" name="nom" id="nom" value="" class="form-control">
    </div>
    <div class="form-group">
    Duree <input type="text" name="duree" id="duree" value="" class="form-control">
    </div>
    <input type="submit" name="btn_inscription_formation" id="btn_inscription_formation" value="Enregistrer la formation !" class="btn btn-lg btn-default">
</form>
<?

?>