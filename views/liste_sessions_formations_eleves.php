<h1>Liste des inscriptions eleves à des sessions de formation</h1>

<p style="text-align:right; padding:12px;"><a href="/exercices/ex4_POO_centre_de_formation/?page=inscription_session_formation_eleve" class="btn btn-sm btn-primary">Ajouter une inscription d'eleve</a></p>

<table><tr><th>Id</th><th>Session</th><th>Eleve</th><th>Date inscription</th><th></th></tr><?php

if(MySQL) {
    
    try {
    
    $tab = $db->query('SELECT ise.*, sf.*, f.intitule as NomFormation, e.prenom as PrenomEleve, e.nom as NomEleve from `inscriptions_session_eleves` ise, sessions_formations sf, formations f, eleves e where e.id=ise.eleve_id and ise.session_id=sf.sf_id and sf.formation=f.id');
    
    foreach($tab as $a) {
        ?>
        <tr>
            <td><?=$a['ie_id'];?></td>
            <td><?=$a['NomFormation']." (du ".$a['date_debut']." au ".$a['date_fin']." )";?></td>
            <td><?=$a['PrenomEleve']." ".$a['NomEleve'];?></td>
            <td><?=$a['date_inscription'];?></td>
            <td class="action_box"><a href="/exercices/ex4_POO_centre_de_formation/?page=maj_session_formation_eleve&session_formation_eleve_id=<?=$a['ie_id'];?>" class="btn btn-sm btn-default">Modifier</a>
                &nbsp;&nbsp;&nbsp;<a href="#" onclick="if(confirm('Sur ?')) document.location='/exercices/ex4_POO_centre_de_formation/?act=DELETE_INSCRIPTION_ELEVE_SESSION_FORMATION&session_formation_eleve_id=<?=$a['ie_id'];?>'; " class="btn btn-sm btn-danger">Effacer</a></td>
        </tr>
        <?php
    }
    
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}
    
?></table>


