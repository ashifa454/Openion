<?php include('database/connection.php'); session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Openion | SignUp</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
  </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <?php include 'components/general/header.php'; ?>
        <?php include 'components/general/drawer.php'; ?>  
      <div class="android-content mdl-layout__content">
      
        <!--Main Form!-->
        <div class="android-wear-section">
            <div class="sign-up">
            <div class="android-wear-band-text3 mdl-demo" style="background-color:white;">
             <div class="mdl-typography--display-1">Hi ! <?php echo $_SESSION['name']; ?></div>
             <hr/>
              <form class="sign_up">
                <div>
                <label for="sample3">Whats your Birthday Date</label><br/>
                <input id="DOB" type="date" placeholder="****" required="">
                <span class="error" id="passworderror"></span>
                </div>
                <div>
                <label>What do you do?</label><br/>
                <select required="" id="occupation">
                  <option value="">Choose one of the option</option>
                  <option value="S">Study</option>
                  <option value="J">Job</option>
                  <option value="B">Business</option>
                  <option value="H">Home Maker</option>
                </select>
                <span class="error" id="nameerror"></span>
                </div>
                <div>
                <label for="sample3">Where do you do?</label><br/>
                <input type="text" id="place" placeholder="Department / Institute / Place" required="">
                <span class="error" id="mobileerror"></span>
                </div>
                <div>
                <label for="sample3">Address</label><br/>
                <input type="text" id="address" placeholder="Your Address" required="">
                <span class="error" id="emailerror"></span>
                </div>
                <div>
                <label for="sample3">Zip Code</label><br/>
                <input type="text" id="pincode" placeholder="Postal Code" required="">
                </div>
               <center><button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored pull-right mdl-color--orange-400" type="submit">
                <i class="material-icons">done</i>
                </button>
                </center>
              </form>
            </div>
          </div>
        </div>
        <?php include 'components/general/footer.php'; ?>
      </div>
       <div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>
    </div>
    <script type="text/javascript">
      $( ".sign_up" ).submit(function(event) {
          var dataval={
            "DOB":$("#DOB").val(),
            "OCC":$("#occupation").val(),
            "OCCPLACE":$("#place").val(),
            "Address":$("#address").val(),
            "PIN":$("#pincode").val()
          }
          dataval=$(this).serialize()+"&"+$.param(dataval);
      $.ajax({
        url:'../control/profile',
        dataType:'JSON',
        method:'POST',
        data:dataval,
        success:function(data){
          if(data=='VI'){
            window.location="../view/index"
          }
          if(data=='UA'){
              'use strict';
              var handler = function(event) {  
                location.reload();
              };
              var snackbarContainer = document.querySelector('#demo-snackbar-example');
              var data = {
              message: 'Oop Something went Wrong!',
              timeout: 6000,
              actionHandler: handler,
              actionText: 'Retry'
            };
              snackbarContainer.MaterialSnackbar.showSnackbar(data);
          }
        }
      });
       event.preventDefault();
      });
    </script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  </body>
</html>