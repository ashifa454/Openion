<?php include('database/connection.php'); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Login | Korridor India</title>
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
             <div class="mdl-typography--display-1">Login</div>
             <hr/>
              <div class="sign_up">
                <div>
                <label>Whats Your Email Id</label><br/>
                <input type="email" id="LoginEmail" placeholder="Email id" required="">
                <span class="error" id="mobileerror"></span>
                </div>
                <div>
                <label for="sample3">Password</label><br/>
                <input type="password" id="LoginPass" placeholder="*******" required="">
                <span class="error" id="emailerror"></span>
                </div>
                <span for="sample3">Forget Password? </span><br/>
               <center><button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored pull-right mdl-color--orange-400" onclick="checkName()">
                <i class="material-icons">done</i>
                </button>
                </center>
              </div>
              <hr/>
              <center><div class="mdl-typography--display-1 mdl-typography--font-thin">New at Korridor.
              <a class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored pull-right mdl-color--blue-400" href="signup?id=1" id="signupbtn">
                <i class="material-icons">chevron_right</i>
              </a></div></center>  
            </div>
          </div>
        </div>
        <div class="mdl-tooltip" for="signupbtn" style="font-size:13px;">
          Click here to signup
        </div>
        <?php include 'components/general/footer.php'; ?>
      </div>
      <div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>
    </div>
    <script type="text/javascript">
      function checkName(){
        var dataval={
        "username":$('#LoginEmail').val(),
        "password":$('#LoginPass').val()
      }
      dataval=$(this).serialize()+"&"+$.param(dataval);
      $.ajax({
        url:'../control/userLogin',
        dataType:'JSON',
        method:'POST',
        data:dataval,
        success:function(data){
          if(data==1){
            window.location="../index"
          }
          else{
              'use strict';
              var handler = function(event) {  
                location.reload();
              };
              var snackbarContainer = document.querySelector('#demo-snackbar-example');
              var data = {
              message: 'Invalid Login Credentials Login Fail.',
              timeout: 6000,
              actionHandler: handler,
              actionText: 'Retry'
            };
              snackbarContainer.MaterialSnackbar.showSnackbar(data);
          }
        }
      });
      }
    </script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  </body>
</html>