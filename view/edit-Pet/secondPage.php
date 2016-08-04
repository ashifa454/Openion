<?php
    include('database/connection.php');
    $cm=new ConnectionManager();
    $cm->connectConnection();
    $id=$_SESSION['changeid'];
    $result=$cm->selectQuery('SELECT * From Patetion Where `id`='.$id);
    $supportCount=$cm->selectQuery('SELECT * FROM support,user where support.u_id=user.id AND support.p_id='.$id);
    $peopleChoice=$cm->selectQuery('Select * from Patetion where id in (SELECT support.p_id FROM support GROUP BY p_id order by p_id DESC) AND Patetion.is_victory=0');
    foreach($result as $rst){
      //$title=$rst['Patetion_title'];
      $posted_for=$rst['target_name'];
      $identity=$rst['target_identity'];
    }
    $cm->closeConnection();
?>
<!doctype html>
<html lang="en">
  <head>
    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Decision | Lokvishay</title>

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="http://localhost/korridor/assets/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="assets/css/style.css">
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
        <?php include 'components/general/header.php'; ?>
        <?php include 'components/general/drawer.php'; ?>  
      <div class="android-content mdl-layout__content">
        
        <!--Main Form!-->
        <div class="android-wear-section">
            <div class="android-wear-band">
            <div class="android-wear-band-text mdl-shadow--4dp">
              <div class="mdl-typography--display-2 mdl-typography--font-thin">2. Edit who can take Decision on it.</div>
              	<p class="mdl-typography--font-light mdl-typography--subhead">
               		Choose a the person, organisation, or group that can make a decision about your petition. we will send notify them about your Lokvishay and encourage a response.
              </p>
           <form action="../control/modifypatetion?id=4" method="post">
          <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
    			<input class="mdl-textfield__input mdl-typography--subhead" type="text" name="target" autofocus  onkeyup="showResult(this.value)" autocomplete="off" required="" value="<?php echo $posted_for." (".$identity.")" ?>">
          <label class="mdl-textfield__label" for="sample3">Who can Make this Happen?</label>
          </div>
          <div id="recep">
          </div>
          <div id="livesearch">
          </div>
              <ul class="mdl-list">
              <p class="mdl-typography--headline mdl-typography--font-thin ">
               	How to find the right decision maker.
              </p>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Choose someone who can give you what you want</span>
      <span class="mdl-list__item-text-body">
        You might need to do some research to find the right person who can make the decision.
      </span>
    </span>
    
  </li>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Don't go directly to the top</span>
      <span class="mdl-list__item-text-body">
       You might see faster results if you choose a more junior person who is petitioned less often than more recognisable figures.
      </span>
    </span>
    </li>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Choose someone you can work with</span>
      <span class="mdl-list__item-text-body">
        Your petition is most likely to win by reaching an agreement with your decision maker.
      </span>
    </span>
    
  </li>
</ul>
              <p>
              <button class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-color--blue-400" type="submit" id="updt">
  					<i class="material-icons">chevron_right</i>
				</button>
               <a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored pull-right mdl-color--orange-400" id="skp" href="edit?id=3&&p_id=<?php echo $id; ?>" >
            <i class="material-icons">skip_next</i>
        </a>
        <div class="mdl-tooltip mdl-tooltip" for="skp" style="font-size:13px;">
            Skip to next
        </div>
        <div class="mdl-tooltip mdl-tooltip" for="updt" style="font-size:13px;">
            Update title of your Lokvishay.
        </div>
              </p>
               </form>
            </div>
          </div>
        </div>
               <?php include 'components/general/footer.php'; ?>
      </div>
    </div>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <script type="text/javascript" src="assets/js/livesearch2.js"></script>
  </body>
</html>
