<!DOCTYPE html>
<html lang="fr">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <title>EX 4 POO</title>

    <!-- Bootstrap -->
    <link href="assets/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/css/custom.css" rel="stylesheet">
    
  </head>
  <body>
      
      
      
      
      
      <? require_once(dirname(__FILE__).'/menu.inc.php'); ?>
      
      <article>


        <?php if($_SESSION['action_status'] && $_SESSION['action_msg']!='') { ?><div class="alert alert-success" role="alert"><?=$_SESSION['action_msg'];?></div><?php }
        
        //on purge le message
        $_SESSION['action_label']   = '';
        $_SESSION['action_status']  = false;
        $_SESSION['action_msg']     = '';
        
        ?>



          
          