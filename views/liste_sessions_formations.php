<h1>Liste des sessions de formations du centre</h1>

<p style="text-align:right; padding:12px;"><a href="/exercices/ex4_POO_centre_de_formation/?page=inscription_session_formation" class="btn btn-sm btn-primary">Ajouter une session de formation</a></p>

<table><tr><th>Id</th><th>Formation</th><th>Animateur</th><th>Date debut</th><th>Date fin</th><th></th></tr><?php

if(MySQL) {
    
    try {
    
    $tab = $db->query('SELECT sf.*, f.intitule as NomFormation, a.prenom as PrenomAnimateur, a.nom as NomAnimateur from `sessions_formations` sf, formations f, animateurs a where a.id=sf.animateur_id and f.id=sf.formation');
    
    foreach($tab as $a) {
        ?>
        <tr>
            <td><?=$a['sf_id'];?></td>
            <td><?=$a['NomFormation'];?></td>
            <td><?=$a['PrenomAnimateur']." ".$a['NomAnimateur'];?></td>
            <td><?=$a['date_debut'];?></td>
            <td><?=$a['date_fin'];?></td>
            <td class="action_box"><a href="#" class="btn btn-sm btn-default">voir les eleves inscrits</a>
                &nbsp;&nbsp;&nbsp;<a href="/exercices/ex4_POO_centre_de_formation/?page=maj_session_formation&session_formation_id=<?=$a['sf_id'];?>" class="btn btn-sm btn-default">Modifier</a>
                &nbsp;&nbsp;&nbsp;<a href="#" onclick="if(confirm('Sur ?')) document.location='/exercices/ex4_POO_centre_de_formation/?act=DELETE_SESSION_FORMATION&session_formation_id=<?=$a['sf_id'];?>'; " class="btn btn-sm btn-danger">Supprimer</a></td>
        </tr>
        <?php
    }
    
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}
    
?></table>


