<?php

@session_start();

define('DIR_ROOT',dirname(__FILE__));
define('URL_ROOT','/exercices/ex4_POO_centre_de_formation/');

//mettre à false si on fonctionne avec les sessions plutot qu'avec MySQL
define('MySQL',true);

require_once(dirname(__FILE__).'/classes/TableCollection.php');
require_once(dirname(__FILE__).'/classes/ToolBox.php');
require_once(dirname(__FILE__).'/classes/MySQL.php');
require_once(dirname(__FILE__).'/classes/Personne.php');
require_once(dirname(__FILE__).'/classes/Eleve.php');
require_once(dirname(__FILE__).'/classes/CentreFormation.php');
require_once(dirname(__FILE__).'/classes/Formation.php');
require_once(dirname(__FILE__).'/classes/SessionFormation.php');
require_once(dirname(__FILE__).'/classes/EleveSessionFormation.php');
require_once(dirname(__FILE__).'/classes/Animateur.php');

/* si on se tourve dans une classe
//use classes\Formation as Formation;
//use classes\SessionFormation as SessionFormation;
//use classes\Animateur as Animateur;
use exercices\ex4_POO_centre_de_formation\classes as Lib;
//use classes\CentreFormation as CentreFormation;
*/

//tableau de session simulant la base de donnees
if(!isset($_SESSION['formations'])) $_SESSION['formations'] = array();
if(!isset($_SESSION['sessionsFormations'])) $_SESSION['sessionsFormations'] = array();
if(!isset($_SESSION['eleves'])) $_SESSION['eleves'] = array();
if(!isset($_SESSION['animateurs'])) $_SESSION['animateurs'] = array();
if(!isset($_SESSION['InscriptionSessionsEleves'])) $_SESSION['InscriptionSessionsEleves'] = array();

//gestion de la base de donnees
$tools = new ToolBox();
$tools->safe_post_data();

//gestion de la base de donnees
/*$bdd = new MySQL('localhost','root','');
$bdd->setBase('ex4_poo');
$bdd->run();*/

//utilisation de PDO à la place des fonctions natives php pour mysql
try {
$db = new PDO('mysql:host=localhost;dbname='.'ex4_poo', $user='root', $pass='');

//pour renvoyer les messages d'erreurs via PDO
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

//pour le traitement des fonctions
require_once(dirname(__FILE__).'/action.php');

require_once(dirname(__FILE__).'/header.inc.php');

$page = '';
if( isset($_GET['page']) ) $page = $_GET['page'];

switch($page) {
    case 'inscription_session_formation_eleve':
        require(dirname(__FILE__).'/views/inscription_session_formation_eleve.php');
    break;
    case 'liste_sessions_formations_eleves':
        require(dirname(__FILE__).'/views/liste_sessions_formations_eleves.php');
    break;
    case 'inscription_session_formation':
        require(dirname(__FILE__).'/views/inscription_session_formation.php');
    break;
    case 'liste_sessions_formations':
        require(dirname(__FILE__).'/views/liste_sessions_formations.php');
    break;
    case 'maj_session_formation_eleve':
        require(dirname(__FILE__).'/views/maj_session_formation_eleve.php');
    break;
    case 'maj_session_formation':
        require(dirname(__FILE__).'/views/maj_session_formation.php');
    break;
    case 'maj_formation':
        require(dirname(__FILE__).'/views/maj_formation.php');
    break;
    case 'maj_eleve':
        require(dirname(__FILE__).'/views/maj_eleve.php');
    break;
    case 'maj_centre':
        require(dirname(__FILE__).'/views/maj_centre.php');
    break;
    case 'maj_animateur':
        require(dirname(__FILE__).'/views/maj_animateur.php');
    break;
    case 'inscription_formation':
        require(dirname(__FILE__).'/views/inscription_formation.php');
    break;
    case 'liste_formations':
        require(dirname(__FILE__).'/views/liste_formations.php');
    break;
    case 'inscription_animateur':
        require(dirname(__FILE__).'/views/inscription_animateur.php');
    break;
    case 'liste_animateurs':
        require(dirname(__FILE__).'/views/liste_animateurs.php');
    break;
    case 'inscription_eleve':
        require(dirname(__FILE__).'/views/inscription_eleve.php');
    break;
    case 'inscription_centre':
        require(dirname(__FILE__).'/views/inscription_centre.php');
    break;
    case 'liste_eleve':
        require(dirname(__FILE__).'/views/liste_eleve.php');
    break;
    case 'liste_centres':
        require(dirname(__FILE__).'/views/liste_centres.php');
    break;
    /*case 'clear':
        session_destroy();
    break;
    case 'simulate':
        $_SESSION = unserialize('a:5:{s:10:"formations";a:1:{i:0;O:9:"Formation":2:{s:3:"nom";s:9:"formation";s:5:"duree";s:1:"2";}}s:18:"sessionsFormations";a:1:{i:0;O:16:"SessionFormation":3:{s:9:"formation";r:3;s:10:"date_debut";s:10:"20/04/2015";s:8:"date_fin";s:10:"24/04/2015";}}s:6:"eleves";a:1:{i:0;O:5:"Eleve":2:{s:3:"nom";s:6:"benoit";s:6:"prenom";s:9:"soulignac";}}s:10:"animateurs";a:1:{i:0;O:9:"Animateur":2:{s:3:"nom";s:4:"jean";s:6:"prenom";s:6:"saigne";}}s:25:"InscriptionSessionsEleves";a:0:{}}');
    break;*/    
    default:
        require(dirname(__FILE__).'/views/liste_sessions_formations.php');//require(dirname(__FILE__).'/views/homePage.php');
    break;
}

require_once(dirname(__FILE__).'/footer.inc.php');

//$bdd->bye();
$db = null;


} catch (PDOException $e) {
    print "Erreur !: " . $e->getMessage() . "<br/>";
    $db = null;
    die();
}

?>