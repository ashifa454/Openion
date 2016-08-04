<?php
    include('../database/connection.php');
    $cm=new ConnectionManager();
    $cm->connectConnection();
    $id=$_SESSION['current_id'];
    $result=$cm->selectQuery('SELECT * From Patetion Where `id`='.$id);
    $supportCount=$cm->selectQuery('SELECT * FROM support,user where support.u_id=user.id AND support.p_id='.$id);
    $peopleChoice=$cm->selectQuery('Select * from Patetion where id in (SELECT support.p_id FROM support GROUP BY p_id order by p_id DESC) AND Patetion.is_victory=0');
    foreach($result as $rst){
      $title=$rst['Patetion_title'];
      $posted_for=$rst['target_name'];
      $identity=$rst['target_identity'];
    }
?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Openion | Browse All Patetion</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/Styles2.css">
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <?php include '../components/general/header.php'; ?>
        <?php include '../components/general/drawer.php'; ?>  
      <div class="android-content mdl-layout__content">
        <div class="android-wear-section">
            <div class="android-wear-band">
            <div class="android-wear-band-text mdl-shadow--2dp" style="display:inline-block;">
              <div class="mdl-typography--display-1 mdl-typography--font-medium mdl-typography--text-center"><?php echo $title.'.'; ?>
              </div>
              <div class="mdl-typography--text-center">@<?php echo $posted_for.' ('.$identity.')' ?></div> 

              <div class="mdl-cell mdl-cell--8-col" style=" lear:right; float:left;">
                    <img class="article-image" src="../assets/Raw/12.jpg" border="0" alt="">
                <?php
                $file=fopen("../control/start-Patetion/".$id."_patetion.txt","r");
                echo '<p>'.fread($file,filesize("../control/start-Patetion/".$id."_patetion.txt")).'</p>';
                ?>
                <hr/>
              <div class="mdl-typography--title" style="margin-bottom:20px;">Words by Supporters</div>
<?php
$flag=0;
foreach($supportCount as $sp){
  if($sp['u_id']==$_SESSION['user']){
    $flag=1;
  }
echo '<div class="mdl-card mdl-cell--12-col" style="background-color:inherit;min-height:auto;">
  <div class="mdl-card__title">
    <h3 class="mdl-card__title-text custom-title">'.$sp['reason'].'</h3>
  </div>
  <div class="mdl-card__supporting-text">
    <span>Posted By '.$sp['Name'].'</span><span style="float:right;">Posted On '.$sp['date_time'].'</span>
  </div>
   <div class="mdl-card__menu">
    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
      <i class="material-icons" style="color:RED;">thumb_up</i>
    </button>
  </div>
</div>
<hr/>';
}
?>
              </div>

              <div class="mdl-cell mdl-cell--4-col" style="float:right;";>
                <div class="mdl-typography--display-1">Sign this Petetion</div>
                <div class="mdl-typography--subtitle"><?php echo count($supportCount); ?> People have Supported</div>
                <form action="../control/support" method="post">
                  <div class="mdl-textfield mdl-js-textfield">
                  <textarea class="mdl-textfield__input" type="text" rows= "3" name="reason" ></textarea>
                  <label class="mdl-textfield__label" for="sample5">I am Signing This Petetion Because</label>
                  </div>
                <?php
                if(isset($_SESSION['user'])&&$flag==0){
                echo '<Button class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--blue-400 mdl-cell--12-col" type="submit">Sign this Petetion
                </Button></form>';
                }
                else if($flag==1){
                  echo '<a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--blue-400 mdl-cell--12-col" href="login">Share this Petetion
                 </a>';
                }
                else{
                  echo '<a class="mdl-button mdl-js-button mdl-js-ripple-effect mdl-color--orange-400 mdl-cell--12-col" href="ftp_login(ftp_stream, username, password)">Login to Sign this Petetion
                </a>';
              }
                ?>
                <div class="mdl-typography--title" style="padding:15px; padding-left:0px;">People Choice</div>
              <?php
              foreach($peopleChoice as $pc){
                if($pc['id']!=$id){
    echo '<div class="demo-card-square mdl-card mdl-cell--12-col">
  <div class="mdl-card__title mdl-card--expand" style="background:
  url(../assets/Raw/12.jpg) bottom right 15% no-repeat #46B6AC;">
    <h2 class="mdl-card__title-text">'.$pc['Patetion_title'].'</h2>
  </div>
  <div class="mdl-card__supporting-text">
  @'.$pc['target_name']. '('.$pc['target_identity'].')
  </div>
   <div class="mdl-card__menu">
    <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
      <i class="material-icons">share</i>
    </button>
  </div>
</div><br/>';
}}
?>

              </div>
            </div>
          </div>
        </div>
        <?php include '../components/general/footer.php'; ?>
      </div>
    </div>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  </body>
</html>