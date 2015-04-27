<div class="bs-example bs-navbar-top-example" data-example-id="navbar-fixed-to-top" style="/*display:none;/**/">
    <nav class="navbar navbar-default navbar-fixed-top">
      <!-- We use the fluid option here to avoid overriding the fixed width of a normal container within the narrow content columns. -->
      <div class="container-fluid">
        <div class="navbar-header">
          <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target="#bs-example-navbar-collapse-6">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="navbar-brand" href="#">EX4 POO</a>
        </div>

        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-6">
          <ul class="nav navbar-nav">
              <li class=" <? if( !isset($_GET['page']) || ($_GET['page']=='') ) echo " active"; ?>"><a href="/exercices/ex4_POO_centre_de_formation/">Accueil</a></li>
              <li class="dropdown <? if(isset($_GET['page']) && ( ($_GET['page']=='liste_centres') || ($_GET['page']=='inscription_centre') ) ) echo " active"; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Centres <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/exercices/ex4_POO_centre_de_formation/?page=liste_centres">Liste</a></li>
                  <li><a href="/exercices/ex4_POO_centre_de_formation/?page=inscription_centre">Ajouter</a></li>
                </ul>
              </li>
              <li class="dropdown <? if(isset($_GET['page']) && ( ($_GET['page']=='liste_formations') || ($_GET['page']=='inscription_formation') ) ) echo " active"; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Formations <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/exercices/ex4_POO_centre_de_formation/?page=liste_formations">Liste</a></li>
                  <li><a href="/exercices/ex4_POO_centre_de_formation/?page=inscription_formation">Ajouter</a></li>
                </ul>
              </li>
              <li class="dropdown <? if(isset($_GET['page']) && ( ($_GET['page']=='liste_sessions_formations') || ($_GET['page']=='inscription_session_formation') ) ) echo " active"; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Sessions <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/exercices/ex4_POO_centre_de_formation/?page=liste_sessions_formations">Liste</a></li>
                  <li><a href="/exercices/ex4_POO_centre_de_formation/?page=inscription_session_formation">Ajouter</a></li>
                </ul>
              </li>
              <li class="dropdown <? if(isset($_GET['page']) && ( ($_GET['page']=='liste_animateurs') || ($_GET['page']=='inscription_animateur') ) ) echo " active"; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Animateurs <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/exercices/ex4_POO_centre_de_formation/?page=liste_animateurs">Liste</a></li>
                  <li><a href="/exercices/ex4_POO_centre_de_formation/?page=inscription_animateur">Ajouter</a></li>
                </ul>
              </li>
              <li class="dropdown <? if(isset($_GET['page']) && ( ($_GET['page']=='liste_eleve') || ($_GET['page']=='inscription_eleve') ) ) echo " active"; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Eleves <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/exercices/ex4_POO_centre_de_formation/?page=liste_eleve">Liste</a></li>
                  <li><a href="/exercices/ex4_POO_centre_de_formation/?page=inscription_eleve">Ajouter</a></li>
                </ul>
              </li>
              <li class="dropdown <? if(isset($_GET['page']) && ( ($_GET['page']=='liste_sessions_formations_eleves') || ($_GET['page']=='inscription_session_formation_eleve') ) ) echo " active"; ?>">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Inscriptions Eleves<span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="/exercices/ex4_POO_centre_de_formation/?page=liste_sessions_formations_eleves">Liste</a></li>
                  <li><a href="/exercices/ex4_POO_centre_de_formation/?page=inscription_session_formation_eleve">Ajouter</a></li>
                </ul>
              </li>
          </ul>
        </div><!-- /.navbar-collapse -->
      </div>
    </nav>
  </div>

