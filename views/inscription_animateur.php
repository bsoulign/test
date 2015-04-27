<?php
/*if(isset($_POST['btn_inscription_animateur'])) {
    
    $e = new Animateur($_POST['nom'], $_POST['prenom']);
    $e->Add();   
    
    echo "<br><br>Animateur ajoute !<br><br>";
    
}*/
?>
<form name="f_inscription_animateur" method="post" action="./?act=ADD_ANIMATEUR">
    <div class="form-group">
        <label for="nom">Nom</label> <input type="text" name="nom" id="nom" value="" class="form-control">
    </div>
    <div class="form-group">
        <label for="prenom">Prenom</label> <input type="text" name="prenom" id="prenom" value="" class="form-control">
    </div>
    <input type="submit" name="btn_inscription_animateur" id="btn_inscription_animateur" value="Enregistrer l'animateur !" class="btn btn-lg btn-default">
</form>
<?

?>