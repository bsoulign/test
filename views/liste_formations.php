<h1>Liste des formations du centre</h1>

<p style="text-align:right; padding:12px;"><a href="/exercices/ex4_POO_centre_de_formation/?page=inscription_formation" class="btn btn-sm btn-primary">Ajouter une formation</a></p>

<table><tr><th>Id</th><th>Intitule</th><th>Durée (jours)</th><th></th></tr><?php

if(MySQL) {
    
    try {
    
    $tab = $db->query('SELECT * from formations');
    
    foreach($tab as $a) {
        ?>
        <tr>
            <td><?=$a['id'];?></td>
            <td><?=$a['intitule'];?></td>
            <td><?=$a['duree_jours'];?></td>
            <td class="action_box"><a href="/exercices/ex4_POO_centre_de_formation/?page=inscription_session_formation" class="btn btn-sm btn-default">rattacher à une session</a>
                &nbsp;&nbsp;&nbsp;<a href="/exercices/ex4_POO_centre_de_formation/?page=maj_formation&formation_id=<?=$a['id'];?>" class="btn btn-sm btn-default">Modifier</a>
                &nbsp;&nbsp;&nbsp;<a href="#" onclick="if(confirm('Sur ?')) document.location='/exercices/ex4_POO_centre_de_formation/?act=DELETE_FORMATION&formation_id=<?=$a['id'];?>'; " class="btn btn-sm btn-danger">Supprimer</a></td>
        </tr>
        <?php
    }
    
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}
    
?></table>

