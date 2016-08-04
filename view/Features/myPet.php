<?php include('database/connection.php'); session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>My vishay | Lokvishay</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <link rel="stylesheet" href="../assets/dist/social-share-kit.css" type="text/css">
    <script src="https://cdn.jsdelivr.net/sharer.js/latest/sharer.min.js"></script>
    <script src="../assets/dist/sweetalert.min.js">

    </script> <link rel="stylesheet" type="text/css" href="../assets/dist/sweetalert.css">
    <link rel="stylesheet" href="../assets/css/mypet.css">
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
             <div class="mdl-typography--display-1">My Petetions</div>
             <hr/>
             <?php
              $cm=new ConnectionManager();
              $cm->connectConnection();
            $result=$cm->selectQuery('SELECT * from description,Patetion where description.p_id=Patetion.id and Patetion.user_id='.$_SESSION['user']);
              
            foreach($result as $rst){
              if($rst['p_id']!=NULL){
              $date=date_create($rst[6],timezone_open("Asia/kolkata"));
          echo '<section class="section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp">';
          if(file_exists('../assets/Raw/'.$rst['p_id'].'.jpg')){
                   echo '<header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white" style="background-image:url(../assets/Raw/'.$rst['p_id'].'.jpg); background-size:cover;">
            </header>';
                    }
                    else{
                      $filename = "assets/Raw/".$rst['p_id']."-*";
                        $rs=glob($filename);
                        $rs=split("-",$rs[0]);
                        $rs=substr($rs[1],0,count($rs[1])-5);
                        echo '<header class="section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white" style="background-image:url(http://img.youtube.com/vi/'.$rs.'/hqdefault.jpg); background-size:cover;">
            </header>';
                      }
            echo '<div class="mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone">
              <div class="mdl-card__title">
               <h4 class="mdl-card__title-text">'.$rst['Patetion_title'].'</h4>
              </div>
              <p style="padding:10px; min-height:50px;" id="area'.$rst['p_id'].'">
              '.$rst['Description'].'...<a href="showPet?petId='.$rst['p_id'].'">Read More</a>
              </p>
              <div class="mdl-card__actions">
                <a href="#" style="text-decoration:none;" class="unusable_link">on '.date_format($date,"d-M-Y").'</a>
                 <a href="#" class="mdl-navigation__link" style="float:right;">@'.$rst['target_name'].' ('.$rst['target_identity'].')</a>
              </div>
              <div class="mdl-card__menu">';
              if($rst['is_available']==1){
              echo '
                    <button href="" class="mdl-button mdl-button--icon ssk  ssk-icon ssk-facebook sharer" data-text="Text for twitter" data-sharer="facebook" data-url="https://ellisonleao.github.io/sharer.js/"></button>';
              }else{
                $text=-1;
                echo '<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick="copypath('.$rst['id'].','.$text.')">
                    <i class="material-icons" style="color:#000000;">flag</i>
              </button>';
              }
              if($rst['is_available']==0){
              echo '<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" id="more-button'.$rst['id'].'">
                    <i class="material-icons" style="color:#000000;">expand_more</i>
              </button>
              <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button'.$rst['id'].'">
            <li class="mdl-menu__item" id="show-dialog" onclick="showEditBox('.$rst['id'].')">Edit <i class="material-icons" style="float:right;">mode_edit</i></li>
            <li class="mdl-menu__item" onclick="deletePet()">Delete <i class="material-icons" style="float:right;">delete</i></li>
          </ul>';
        }else{
          echo '<button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" id="sharebtn'.$rst['id'].'">
                    <i class="material-icons" style="color:#000000;">expand_more</i>
              </button>
              <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="sharebtn'.$rst['id'].'">
            <li class="mdl-menu__item"><a href="#" class="ssk  ssk-icon ssk-twitter sharer" data-text="Text for twitter" data-sharer="twitter" data-url="https://ellisonleao.github.io/sharer.js/"><d>  twitter</d></a></li>
            <li class="mdl-menu__item"><a href="#" class="ssk ssk-icon ssk-google-plus sharer" data-text="Text for twitter" data-sharer="googleplus" data-url="https://ellisonleao.github.io/sharer.js/"><d>  Google</d></a></li>
            <li class="mdl-menu__item"><a href="#" class="ssk ssk-icon ssk-whatsapp sharer" data-text="Text for twitter" data-sharer="whatsapp" data-url="https://ellisonleao.github.io/sharer.js/"><d>  whatsapp</d></a></li>
   
          </ul>';
        }

            echo '</div>
            </div>
            <div>
          </div>
    </section><br/>';
            }
          else{
            echo '<center><div class="mdl-typography--display-1 mdl-typography--font-thin">No patetion found, start a patetion now<br/>
              <a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored pull-right mdl-color--blue-400" href="start-patetion.php?id=1" id="signupbtn">
                <i class="material-icons">chevron_right</i>
              </a></div></center>';
          }
          }
          
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