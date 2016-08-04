<?php include('database/connection.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Explain | Lokvishay</title>

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="http://localhost/korridor/assets/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../assets/css/style.css">
   <script type="text/javascript" src="../assets/javascript/ckeditor.js"></script>
  <script type="text/javascript" src="../assets/javascript/sample.js"></script> 
  
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
              <div class="mdl-typography--display-2 mdl-typography--font-thin">3. Explain the problem you want to solve.</div>
              	<p class="mdl-typography--font-light mdl-typography--subhead">
               		People will love to support your Lokvishay if it’s clearifying your problem. Explain how this rise affect your, your family, or your community.
              </p>
              <!--Place where data Comes!-->
        <form action="../control/start-Patetion/regPatetion?id=3" method="post">
  				<textarea id="editor" name="body" required=""></textarea>
              <ul class="mdl-list">
              <p class="mdl-typography--headline mdl-typography--font-thin ">
               	How to inspire your readers to react.
              </p>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Describe the people involved and the problem they are facing</span>
      <span class="mdl-list__item-text-body">
       Readers are most likely to take action when they understand who is affected.
      </span>
    </span>
    
  </li>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Explain the solution</span>
      <span class="mdl-list__item-text-body">
       Explain what needs to happen and who can make the change. Make it clear what happens if you win or lose.
      </span>
    </span>
    </li>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Make it personal</span>
      <span class="mdl-list__item-text-body">
        Readers are more likely to sign and support your petition if it’s clear why you care.
      </span>
    </span>
    
  </li>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Respect others</span>
      <span class="mdl-list__item-text-body">
       Don't bully, use hate speech, threaten violence or make things up.
      </span>
    </span>
    
  </li>
</ul>
<p>
              <a class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-color--blue-400">
  					<i class="material-icons">looks_3</i>
				</a>
               <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored pull-right mdl-color--orange-400" type="submit">
  					<i class="material-icons">chevron_right</i>
				</button>
              </p>
            </form>
            </div>
          </div>
        </div>
                  <?php include 'components/general/footer.php'; ?>
   </div>
    </div>
  </body>
  <script>
  initSample();
</script>
  <script src="https://code.getmdl.io/1.1.3/material.min.js" type="text/javascript"></script>
</html>
