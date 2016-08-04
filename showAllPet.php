<?php include('../database/connection.php'); session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Openion | Korridor India</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <?php include '../components/general/header.php'; ?>
        <?php include '../components/general/drawer.php'; ?>  
      <div class="android-content mdl-layout__content">
      
        <!--Main Form!-->
        <div class="android-wear-section">
            <div class="android-wear-band">
            <div class="android-wear-band-text mdl-demo" style="background-color:white;">
             <div class="mdl-typography--display-1">Petetions</div>
             <hr/>
             <?php
              $cm=new ConnectionManager();
              $cm->connectConnection();
            $result=$cm->selectQuery('SELECT * From Patetion,description,user where Patetion.id=description.p_id AND Patetion.user_id=user.id ORDER BY date_time DESC');
            foreach($result as $rst){
          echo '<section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">
            <header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white" style="background-image:url(../assets/Raw/'.$rst['p_id'].'.jpg); background-size:cover;">
            </header>
            <div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
              <div class="mdl-card__title">
               <a href="showPet?petId='.$rst['p_id'].'" style="text-decoration:none;color:black;"><h4 class="mdl-card__title-text">'.$rst['Patetion_title'].'</h4></a>
              </div>
              <p style="padding:10px; min-height:50px;">
              '.$rst['Description'].'<a href="showPet?petId='.$rst['p_id'].'" style="text-decoration:none;">Read More</a>
              </p>
              <div class="mdl-card__actions">
                <!--<a href="#" style="text-decoration:none;">from '.$rst['Name'].'</a>!-->
                 <a href="#" class="mdl-navigation__link" style="float:right;">@'.$rst['target_name'].' ('.$rst['target_identity'].')</a>
              </div>
              <div class="mdl-card__menu">
              <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
                    <i class="material-icons" style="color:#000000;">share</i>
              </button>
            </div>
            </div>
            <div>
          </div>
    </section><br/>';
            }
            $cm->closeConnection();
           ?>
            </div>
          </div>
        </div>
        <?php include '../components/general/footer.php'; ?>
      </div>
    </div>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  </body>
</html>