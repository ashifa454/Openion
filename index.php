<?php include('database/connection.php'); session_start();?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Korridor India Opening New Doors.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Home | Lokvishay</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <style type="text/css">
  .mdl-dialog{
    width: 350px;
  }
   
    
  </style>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
       <div class="android-header mdl-layout__header mdl-layout__header--transparent" style="background-color:#333;">
        <div class="mdl-layout__header-row">
          <span class="android-title mdl-layout-title">
           <!-- <img class="android-logo-image" src="images/android-logo.png">!-->
          </span>
          <!-- Add spacer, to align navigation to the right in desktop -->
          <div class="android-header-spacer mdl-layout-spacer"></div>
          <!-- Navigation -->
          <div class="android-navigation-container">
            <nav class="android-navigation mdl-navigation">
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="BrowsePet">Browse</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="FeaturedPet">Trending</a>
              <a class="mdl-navigation__link mdl-typography--text-uppercase" href="victory">Victories</a>
            </nav>
          </div>
          <span class="android-mobile-title mdl-layout-title">
            <img class="android-logo-image" src="../assets/images/android-logo.png">
          </span>
           <a href="search" class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="search">
            <i class="material-icons white800">search</i>
          </a>
          <div class="mdl-tooltip" for="search">
              Search Patetion
          </div>
          <button class="android-more-button mdl-button mdl-js-button mdl-button--icon mdl-js-ripple-effect" id="more-button">
            <i class="material-icons white800">more_vert</i>
          </button>
          <ul class="mdl-menu mdl-js-menu mdl-menu--bottom-right mdl-js-ripple-effect" for="more-button">
            <li class="mdl-menu__item">About Openion</li>
            <li class="mdl-menu__item">How it works</li>
            <li class="mdl-menu__item">Privacy Policy</li>
            <li class="mdl-menu__item">Terms and Conditions</li>
          </ul>
        </div>
      </div>
        <?php include 'components/general/drawer.php'; ?>  
      <div class="android-content mdl-layout__content">
        <a name="top"></a>
        <div class="android-be-together-section mdl-typography--text-center">
          <div class="logo-font android-slogan mdl-cell--7-col mdl-cell--5-offset" style="color:white;">Lokvishay, vishay for your <span class="typer">Community</span></div>
          <div class="logo-font android-sub-slogan mdl-cell mdl-cell--5-col mdl-cell--6-offset">
          <?php
          if(isset($_SESSION['user'])){
          echo '<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--orange-400 start-btn" href="start-patetion?id=1" style="padding-top:5px;">Raise Lokvishay for Openion</a>';}
          else{
            echo '<a class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--orange-400 start-btn mdl-cell--12-col-phone" href="login" style="padding-top:5px;">Raise Lokvishay for Openion</a>';
          }
          ?>
          </div>
          <div class="logo-font android-create-character mdl-cell--5-offset">
            <a href="">Why Openion?</a><a href="login">/ Login</a> <a href="signup?id=1">/ SignUp</a>
          </div>

          <a href="#screens">
            <button class="android-fab mdl-button mdl-button--colored mdl-js-button mdl-button--fab mdl-js-ripple-effect">
              <i class="material-icons">expand_more</i>
            </button>
          </a>
        </div>
        <!--Section One!-->
        <div class="android-wear-section">
        <div class="android-screen-section mdl-typography--text-center">
          <div class="mdl-typography--display-1">Featured</div>
        </div><br/>
          <div class="android-card-container mdl-grid">
            <?php
            $cm=new ConnectionManager();
            $cm->connectConnection();
            $result=$cm->selectQuery('SELECT * FROM `Patetion` ORDER BY date_time DESC LIMIT 4');
            foreach($result as $rst){
              if(file_exists('assets/Raw/'.$rst['id'].'.jpg')){
                   echo '<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media" style="background-image:url(../assets/Raw/'.$rst['id'].'.jpg); background-size:cover;height:230px;">
              </div>';
                    }
                    else{
                      $filename = "assets/Raw/".$rst['id']."-*";
                        $rs=glob($filename);
                        $rs=split("-",$rs[0]);
                        $rs=substr($rs[1],0,count($rs[1])-5);
                        echo '<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media" style="background-image:url(http://img.youtube.com/vi/'.$rs.'/hqdefault.jpg); background-size:cover;height:230px;">
              </div>';
                      }
             echo ' <div class="mdl-card__title">
                 <a href="showPet?petId='.$rst['id'].'" style="text-decoration:none;"><h4 class="mdl-card__title-text">'.$rst['Patetion_title'].'</h4></a>
              </div>
               <div class="mdl-card__supporting-text">
               </div>
               <div class="mdl-card__actions mdl-card--border">
               <a href="#" class="mdl-navigation__link card-button">@ '.$rst['target_name'].' ('.$rst['target_identity'].')</a>
        </div>
            <div class="mdl-card__menu">
    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick="reportAbuse()">
      <i class="material-icons">info</i>
    </button>
  </div>
            </div>';
            }
            $cm->closeConnection();
           ?>
          
            
          </div> 
        
            <div class="android-wear-band2">
            <div class="android-wear-band-text2">
              <div class="mdl-typography--display-2 mdl-typography--font-thin">Every Openion is Important!</div>
              <p class="mdl-typography--headline mdl-typography--font-thin">
               	India's Growing Pr relation Agency Korridor is Opening New door for Collection User Openions about System and Community.
              </p>
              <p>
                <a class="mdl-typography--font-regular mdl-typography--text-uppercase android-alt-link" href="victory">
                  See what your Openion can do.&nbsp;<i class="material-icons">chevron_right</i>
                </a>
              </p>
            </div>
          </div>
        </div>
        <div class="android-wear-section">
        <div class="android-screen-section mdl-typography--text-center">
          <div class="mdl-typography--display-1">Newly Added</div>
        </div>
          <div class="android-card-container mdl-grid">
          <?php
            $cm=new ConnectionManager();
            $cm->connectConnection();
            $result=$cm->selectQuery('SELECT * FROM `Patetion` ORDER BY date_time DESC LIMIT 4');
            foreach($result as $rst){
              if(file_exists('assets/Raw/'.$rst['id'].'.jpg')){
                   echo '<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media" style="background-image:url(../assets/Raw/'.$rst['id'].'.jpg); background-size:cover;height:230px;">
              </div>';
                    }
                    else{
                      $filename = "assets/Raw/".$rst['id']."-*";
                        $rs=glob($filename);
                        $rs=split("-",$rs[0]);
                        $rs=substr($rs[1],0,count($rs[1])-5);
                        echo '<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media" style="background-image:url(http://img.youtube.com/vi/'.$rs.'/hqdefault.jpg); background-size:cover;height:230px;">
              </div>';
                      }
             echo '
              <div class="mdl-card__title">
                 <a href="showPet?petId='.$rst['id'].'" style="text-decoration:none;"><h4 class="mdl-card__title-text">'.$rst['Patetion_title'].'</h4></a>
              </div>
               <div class="mdl-card__supporting-text">
               </div>
               <div class="mdl-card__actions mdl-card--border">
               <a href="#" class="mdl-navigation__link card-button">@ '.$rst['target_name'].' ('.$rst['target_identity'].')</a>
        </div>
            <div class="mdl-card__menu">
    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick="reportAbuse()">
      <i class="material-icons">info</i>
    </button>
  </div>
            </div>';
            }
            $cm->closeConnection();
           ?>
            </div>
            <div class="android-wear-band2">
            <div class="android-wear-band-text2">
              <div class="mdl-typography--display-2 mdl-typography--font-thin">Say no to I, yes to We!</div>
              <p class="mdl-typography--headline mdl-typography--font-thin">
               	Come and join our family with 10000+ member from every class of society and initiate a new trends of setting up change.
              </p>
              <p>
                <a class="mdl-typography--font-regular mdl-typography--text-uppercase android-alt-link" href="signup?id=1">
                  SignUp Now&nbsp;<i class="material-icons">chevron_right</i>
                </a>
              </p>
            </div>
          </div>
        </div>
        
        <div class="android-wear-section">
         <div class="android-screen-section mdl-typography--text-center">
          <div class="mdl-typography--display-1">Victories</div>
        </div>
          <div class="android-card-container mdl-grid">
            <?php
            $cm=new ConnectionManager();
            $cm->connectConnection();
            $result=$cm->selectQuery('SELECT * FROM `Patetion` ORDER BY date_time DESC LIMIT 4');
            foreach($result as $rst){
             if(file_exists('assets/Raw/'.$rst['id'].'.jpg')){
                   echo '<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media" style="background-image:url(../assets/Raw/'.$rst['id'].'.jpg); background-size:cover;height:230px;">
              </div>';
                    }
                    else{
                      $filename = "assets/Raw/".$rst['id']."-*";
                        $rs=glob($filename);
                        $rs=split("-",$rs[0]);
                        $rs=substr($rs[1],0,count($rs[1])-5);
                        echo '<div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--4-col-phone mdl-card mdl-shadow--3dp">
              <div class="mdl-card__media" style="background-image:url(http://img.youtube.com/vi/'.$rs.'/hqdefault.jpg); background-size:cover;height:230px;">
              </div>';
                      }
             echo '<div class="mdl-card__title">
                 <a href="showPet?petId='.$rst['id'].'" style="text-decoration:none;"><h4 class="mdl-card__title-text">'.$rst['Patetion_title'].'</h4></a>
              </div>
               <div class="mdl-card__supporting-text">
               </div>
               <div class="mdl-card__actions mdl-card--border">
               <a href="#" class="mdl-navigation__link card-button">@ '.$rst['target_name'].' ('.$rst['target_identity'].')</a>
        </div>
            <div class="mdl-card__menu">
    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect" onclick="reportAbuse()">
      <i class="material-icons">info</i>
    </button>
  </div>
            </div>';
            }
            $cm->closeConnection();
           ?>
          </div>
        </div>
        
        <?php include 'components/general/footer.php'; ?>
      </div>
    </div>
     <dialog class="mdl-dialog" style="padding:0px;">
    <h4 class="mdl-dialog__title mdl-color--blue-700" style="height:45px;color:white;">Login</h4>
    <div class="mdl-dialog__content">
    <form action="#">
                <div class="mdl-cell--12-col mdl-cell--12-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="email" id="LoginEmail" required="" value="">
                <label class="mdl-textfield__label" for="sample3">Email id</label>
                </div>
                <div class="mdl-cell--12-col mdl-cell--12-col-phone mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input class="mdl-textfield__input" type="password" id="LoginPass" required="">
                <label class="mdl-textfield__label" for="sample3">Password</label>
                </div>
                <a class="mdl-navigation__link" >Forget Password?</a>
  </div>
    </div>
    <div class="mdl-dialog__actions">
      <button type="submit" class="mdl-button mdl-color--green-600 login">Login</button>
      <button type="button" class="mdl-button close">Close</button>
    </div>
    </form>
  </dialog>
  <div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>
    <script src="../assets/js/typed.min.js" type="text/javascript"></script>
    <script>
  $(function(){
      $(".typer").typed({
        strings: ["Home.", "City.","Country.","Community."],
        typeSpeed: 400
      });
  });
</script>

    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
  <script type="text/javascript">
  state=false;
    $('.mdl-layout__content').on('scroll', function () {
      var height = $('.mdl-layout__content').scrollTop();
      if(height<50 && state==true){
     $('.android-header').animate({backgroundColor: "#333"},500);
       state=false; 
   }
     if(height>50 && state==false){
      $('.android-header').animate({backgroundColor: "#3f51b5"},500);
      console.log(state==false);
      state=true;
     }   
  });
  </script>
  <script type="text/javascript">
    function reportAbuse(){
      var handler = function(event) {  
                location.reload();
              };
              var snackbarContainer = document.querySelector('#demo-snackbar-example');
              var data = {
              message: 'Do you really wanna report Abuse for this Patetion?.',
              timeout: 6000,
              actionHandler: handler,
              actionText: 'Report'
            };
              snackbarContainer.MaterialSnackbar.showSnackbar(data);
    }
  </script>
  </body>
</html>
