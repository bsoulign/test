<h1>Liste des animateurs du centre</h1>

<p style="text-align:right; padding:12px;"><a href="/exercices/ex4_POO_centre_de_formation/?page=inscription_animateur" class="btn btn-sm btn-primary">Ajouter un animateur</a></p>

<table><tr><th>Id</th><th>Nom</th><th>Prenom</th><th></th></tr><?php

if(MySQL) {
    
    try {
    
    $tab = $db->query('SELECT * from animateurs');
    
    foreach($tab as $a) {
        ?>
        <tr>
            <td><?=$a['id'];?></td>
            <td><?=$a['nom'];?></td>
            <td><?=$a['prenom'];?></td>
            <td class="action_box"><a href="#" class="btn btn-sm btn-default">Rattacher à une session</a>
                &nbsp;&nbsp;&nbsp;<a href="/exercices/ex4_POO_centre_de_formation/?page=maj_animateur&animateur_id=<?=$a['id'];?>" class="btn btn-sm btn-default">Modifier</a>
                &nbsp;&nbsp;&nbsp;<a href="#" onclick="if(confirm('Sur ?')) document.location='/exercices/ex4_POO_centre_de_formation/?act=DELETE_ANIMATEUR&animateur_id=<?=$a['id'];?>'; " class="btn btn-sm btn-danger">Supprimer</a></td>
        </tr>
        <?php
    }
    
    } catch (PDOException $e) {
        print "Erreur !: " . $e->getMessage() . "<br/>";
        die();
    }

}

?></table>

