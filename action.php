<?php

//petit rajour pour pister les diff avec git


$_SESSION['action_label']   = ''; //autre rajout pour git
$_SESSION['action_status']  = false;
$_SESSION['action_msg']     = '';

if(isset($_GET['act'])) {
    
    switch($_GET['act']) {
        /*action sur les eleves*/
        case 'ADD_ELEVE':
            if(isset($_POST['btn_inscription_eleve'])) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new Eleve($_POST['nom'], $_POST['prenom']);
                $e->Add();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_eleve';
                
                //header("location: ");
                //exit;
            }
        break;
        case "UPDATE_ELEVE":
            if(isset($_POST['btn_inscription_eleve']) && ($_GET['eleve_id']>0)) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new Eleve($_POST['nom'], $_POST['prenom']);
                $e->setID( $_GET['eleve_id'] );
                $e->Update();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_eleve';
                
                //header("location: ");
                //exit;
            }
        break;
        case 'DELETE_ELEVE':
            if(isset($_GET['eleve_id'])) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new Eleve();
                $e->Load($_GET['eleve_id']);
                $e->Delete();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_eleve';
                
                //header("location: ");
                //exit;
            }
        break;
        
        /*action sur les animateurs*/
        case 'ADD_ANIMATEUR':
            if(isset($_POST['btn_inscription_animateur'])) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new Animateur($_POST['nom'], $_POST['prenom']);
                $e->Add();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_animateurs';
                
                //header("location: ");
                //exit;
            }
        break;
        case "UPDATE_ANIMATEUR":
            if(isset($_POST['btn_inscription_animateur']) && ($_GET['animateur_id']>0)) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new Animateur($_POST['nom'], $_POST['prenom']);
                $e->setID( $_GET['animateur_id'] );
                $e->Update();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_animateurs';
                
                //header("location: ");
                //exit;
            }
        break;
        case 'DELETE_ANIMATEUR':
            if(isset($_GET['animateur_id'])) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new Animateur();
                $e->Load($_GET['animateur_id']);
                $e->Delete();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_animateurs';
                
                //header("location: ");
                //exit;
            }
        break;
        
        /*action sur les formations*/
        case 'ADD_FORMATION':
            if(isset($_POST['btn_inscription_formation'])) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new Formation($_POST['nom'], $_POST['duree']);
                $e->Add();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_formations';
                
                //header("location: ");
                //exit;
            }
        break;
        case "UPDATE_FORMATION":
            if(isset($_POST['btn_inscription_formation']) && ($_GET['formation_id']>0)) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new Formation($_POST['nom'], $_POST['duree']);
                $e->setID( $_GET['formation_id'] );
                $e->Update();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_formations';
                
                //header("location: ");
                //exit;
            }
        break;
        case 'DELETE_FORMATION':
            if(isset($_GET['formation_id'])) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new Formation();
                $e->Load($_GET['formation_id']);
                $e->Delete();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_formations';
                
                //header("location: ");
                //exit;
            }
        break;
        
        /*action sur les sessions de formations*/
        case 'ADD_SESSION_FORMATION':
            if(isset($_POST['btn_inscription_session_formation'])) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new SessionFormation($_POST['formation_id'], $_POST['animateur_id'], $_POST['date_debut'], $_POST['date_fin']);
                $e->Add();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_sessions_formations';
                
                //header("location: ");
                //exit;
            }
        break;
        case "UPDATE_SESSION_FORMATION":
            if(isset($_POST['btn_inscription_session_formation']) && ($_GET['session_formation_id']>0)) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new SessionFormation($_POST['formation_id'], $_POST['animateur_id'], $_POST['date_debut'], $_POST['date_fin']);
                $e->setID( $_GET['session_formation_id'] );
                $e->Update();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_sessions_formations';
                
                //header("location: ");
                //exit;
            }
        break;
        case 'DELETE_SESSION_FORMATION':
            if(isset($_GET['session_formation_id'])) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new SessionFormation();
                $e->Load($_GET['session_formation_id']);
                $e->Delete();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_sessions_formations';
                
                //header("location: ");
                //exit;
            }
        break;
        
        /*action sur les inscriptions eleves aux sessions de formations*/
        case 'ADD_INSCRIPTION_ELEVE_SESSION_FORMATION':
            if(isset($_POST['btn_inscription_session_formation_eleve'])) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new EleveSessionFormation($_POST['session_formation_index'], $_POST['eleve_index']);
                $e->Add();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_sessions_formations_eleves';
                
                //header("location: ");
                //exit;
            }
        break;
        case "UPDATE_INSCRIPTION_ELEVE_SESSION_FORMATION":
            if(isset($_POST['btn_inscription_session_formation_eleve']) && ($_GET['session_formation_eleve_id']>0)) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new EleveSessionFormation($_POST['session_formation_index'], $_POST['eleve_index']);
                $e->setID( $_GET['session_formation_eleve_id'] );
                $e->Update();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_sessions_formations_eleves';
                
                //header("location: ");
                //exit;
            }
        break;
        case 'DELETE_INSCRIPTION_ELEVE_SESSION_FORMATION':
            if(isset($_GET['session_formation_eleve_id'])) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new EleveSessionFormation();
                $e->Load($_GET['session_formation_eleve_id']);
                $e->Delete();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_sessions_formations_eleves';
                
                //header("location: ");
                //exit;
            }
        break;
    
    /*action sur les eleves*/
        case 'ADD_CENTRE':
            if(isset($_POST['btn_inscription_centre'])) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new CentreFormation($_POST['nom']);
                $e->Add();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_centres';
                
                //header("location: ");
                //exit;
            }
        break;
        case "UPDATE_CENTRE":
            if(isset($_POST['btn_inscription_centre']) && ($_GET['centre_id']>0)) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new CentreFormation($_POST['nom']);
                $e->setID( $_GET['centre_id'] );
                $e->Update();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_centres';
                
                //header("location: ");
                //exit;
            }
        break;
        case 'DELETE_CENTRE':
            if(isset($_GET['centre_id'])) {
                $_SESSION['action_label'] = $_GET['act'];
                
                $e = new CentreFormation();
                $e->Load($_GET['centre_id']);
                $e->Delete();
                
                $_SESSION['action_msg'] = $_GET['act'].' | success !';
                $_SESSION['action_status'] = true;
                
                //on surecrit de façon barbare le paramètre GET
                $_GET['page'] = 'liste_centres';
                
                //header("location: ");
                //exit;
            }
        break;
        
    }
        
    
}





?>