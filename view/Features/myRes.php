<?php include('database/connection.php'); session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>My Support | Korridor India</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/css/myopenion.css">
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <?php include 'components/general/header.php'; ?>
        <?php include 'components/general/drawer.php'; ?>  
      <div class="android-content mdl-layout__content">
      
        <!--Main Form!-->
        <div class="android-wear-section">
            <div class="android-wear-band">
            <div class="android-wear-band-text mdl-demo" style="background-color:white;">
             <div class="mdl-typography--display-1">My Openions</div>
             <hr/>
             <?php
              $cm=new ConnectionManager();
              $cm->connectConnection();
            $result=$cm->selectQuery('SELECT * from support,Patetion where support.u_id='.$_SESSION['user'].' AND support.p_id=Patetion.id ORDER by support.date_time ASC');
            echo '<ul class="timeline">';
            $dir="r";
            foreach($result as $rst){
            echo '<li>
    <div class="direction-'.$dir.'">
      <div class="flag-wrapper">
        <span class="flag"><a href="showPet?petId='.$rst['p_id'].'">'.substr($rst['Patetion_title'],0,30).'...</a></span>
        <span class="time-wrapper"><span class="time">'.$rst[4].'</span></span>
      </div>
      <div class="desc">'.$rst['reason'].'</div>
    </div>
  </li>';
          if($dir="r"){
            $dir="l";
          }else{
            $dir="r";
          }
            }
            echo '</ul>';
            $cm->closeConnection();
           ?>
            </div>
          </div>
        </div>
        <?php include 'components/general/footer.php'; ?>
      </div>
    </div>
    <dialog class="mdl-dialogm editBox">
    <h4 class="mdl-dialog__title">Modify your patetion.</h4>
    <div class="mdl-dialog__content">
    <p><textarea id="editor" name="body" required=""></p></textarea>
    </div>
    <div class="mdl-dialog__actions">
      <button type="button" class="mdl-button save">Save changes</button>
      <button type="button" class="mdl-button close">Close</button>
    </div>
  </dialog>
    <div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>
   <script src="../assets/js/mypet.js"></script>
    <script type="text/javascript">
      
    </script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  </body>
</html>