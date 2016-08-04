<?php include('database/connection.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Title | Lokvishay</title>

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="http://localhost/korridor/assets/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="../assets/css/style.css">
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
              <div class="mdl-typography--display-2 mdl-typography--font-thin">1. Write Title of Lokvishay.</div>
              	<p class="mdl-typography--font-light mdl-typography--subhead">
               		This is the first thing people will see about your vishay. Get their attention with a short title that focusses on the change you’d like them to support.
              </p>
              <form action="control/start-Patetion/regPatetion?id=1" method="post">
  				        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell--10-col">
          <input class="mdl-textfield__input mdl-typography--subhead" type="text" name="title" autofocus required="">
    			<label class="mdl-textfield__label" for="sample3">Title of vishay</label>
  				</div>
              
              <ul class="mdl-list">
              <p class="mdl-typography--headline mdl-typography--font-thin ">
               	How to Write a Perfect Title.
              </p>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Keep it to the point</span>
      <span class="mdl-list__item-text-body">
        Example: "Buy organic, free-range eggs for your restaurants"
 Not: "Stop the inhumane treatment of chickens in battery farms that are force-fed..."
      </span>
    </span>
    
  </li>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Make it solution oriented</span>
      <span class="mdl-list__item-text-body">
       Example: "Raise the minimum wage in to 300₹ a day"
Not: "Stop rising income inequality"
      </span>
    </span>
    </li>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Communicate urgency</span>
      <span class="mdl-list__item-text-body">
        Example: "Approve life-saving medication for my daughter's insurance before it’s too late"
      </span>
    </span>
    
  </li>
</ul>
              <p>
              <a class="mdl-button mdl-js-button mdl-button--fab mdl-button--colored mdl-color--blue-400">
  					<i class="material-icons">looks_one</i>
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
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  </body>
</html>