<?php
/*if(isset($_POST['btn_inscription_eleve'])) {
    
    $e = new Eleve($_POST['nom'], $_POST['prenom']);
    $e->Add();   
    
    echo "<br><br>Eleve ajoute !<br><br>";
    
}*/
?>
<form name="f_inscription_eleve" method="post" action="./?act=ADD_ELEVE">
    <div class="form-group">
        <label for="nom">Nom</label> <input type="text" name="nom" id="nom" value="" class="form-control">
    </div>
    <div class="form-group">
        <label for="prenom">Prenom</label> <input type="text" name="prenom" id="prenom" value="" class="form-control">
    </div>
    <input type="submit" name="btn_inscription_eleve" id="btn_inscription_eleve" value="Enregistrer l'eleve !" class="btn btn-lg btn-default">
</form>
<?

?>