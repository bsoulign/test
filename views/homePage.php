<?php
/*
?>

<a href="./?page=liste_eleve">Liste</a> | <a href="./?page=inscription_eleve">Ajouter un nouvel eleve</a>
<br><br>

<a href="./?page=liste_animateurs">Liste</a> | <a href="./?page=inscription_animateur">Ajouter un nouvel animateur</a>
<br><br>

<a href="./?page=liste_formations">Liste</a> | <a href="./?page=inscription_formation">Ajouter un nouvelle formation</a>
<br><br>

<a href="./?page=liste_sessions_formations">Liste</a> | <a href="./?page=inscription_session_formation">Ajouter un nouvelle session de formation</a>
<br><br>

<a href="./?page=liste_sessions_formations_eleves">Liste</a> | <a href="./?page=inscription_session_formation_eleve">Ajouter un nouvel eleve a une session de formation</a>
<br><br>

<a href="./?page=clear" onclick="if(!confirm('Sur ?')) return false;">Nettoyer la base ($_SESSION)</a>

<?

*/

//print_r( $db );

?><br><br><textarea style="width:100%; height:320px;"><? echo serialize($_SESSION); ?></textarea>