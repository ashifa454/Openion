<?php include('database/connection.php'); ?>
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
             <div class="mdl-typography--display-1">SignUp</div>
             <hr/>
              <form class="sign_up">
                <div>
                <label>Name</label><br/>
                <input type="text" placeholder="Name" required="" autocomplete="off" id="name">
                <span class="error" id="nameerror"></span>
                </div>
                <div>
                <label for="sample3">Mobile</label><br/>
                <input type="text" id="Mobile" placeholder="+91" required="" autocomplete="off">
                <span class="error" id="mobileerror"></span>
                </div>
                <div>
                <label for="sample3">Email id</label><br/>
                <input type="email" id="email" placeholder="abc@xyz.com" required="" autocomplete="off">
                <span class="error" id="emailerror"></span>
                </div>
                <div>
                <label for="sample3">Password</label><br/>
                <input type="password" id="password" placeholder="Create a new password." required="">
                </div>
                <div>
                <label for="sample3">Confirm Password</label><br/>
                <input id="cpassword" type="password" placeholder="Retype your password for security reasons" required="">
                <span class="error" id="passworderror"></span>
                </div>
               <center><button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored pull-right mdl-color--orange-400" type="submit" id="submitbtn">
                <i class="material-icons">chevron_right</i>
                </button>
                </center>
              </form>
            </div>
          </div>
        </div>
        <div class="mdl-tooltip" style="font-size:13px;" for="submitbtn">
        Submit and continue.
        </div>
        <?php include 'components/general/footer.php'; ?>
      </div>
      <div id="demo-snackbar-example" class="mdl-js-snackbar mdl-snackbar">
  <div class="mdl-snackbar__text"></div>
  <button class="mdl-snackbar__action" type="button"></button>
</div>
    </div>
    <script type="text/javascript">
      $( ".sign_up" ).submit(function( event ) {
         
         var IndNum = /^[0]?[789]\d{9}$/;
          if($("#password").val()!=$("#cpassword").val()){
            $("#passworderror").text("Password and Confirm Password should be same!")
            exit();
          }
          else{
           $("#passworderror").text("") 
          }
          if($("#Mobile").val().length<10&&!IndNum.test($("#Mobile").val())){
            $("#mobileerror").text("Please use Your 10 digit Mobile Number!");
            exit();
          }
          else{
           $("#mobileerror").text(""); 
          var dataval={
            "name":$("#name").val(),
            "mobile":$("#Mobile").val(),
            "email":$("#email").val(),
            "password":$("#password").val()
          }
          dataval=$(this).serialize()+"&"+$.param(dataval);
      $.ajax({
        url:'../control/signup',
        dataType:'JSON',
        method:'POST',
        data:dataval,
        success:function(data){
          if(data=='VI'){
            window.location="signup?id=2";
          }
          if(data=='UA'){
              'use strict';
              var handler = function(event) {  
                location.reload();
              };
              var snackbarContainer = document.querySelector('#demo-snackbar-example');
              var data = {
              message: 'Email Id and Mobile Number is already Registered! Use Different.',
              timeout: 6000,
              actionHandler: handler,
              actionText: 'Retry'
            };
              snackbarContainer.MaterialSnackbar.showSnackbar(data);
          }
        }
      });
    }
       event.preventDefault();
      });
    </script>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
  </body>
</html>