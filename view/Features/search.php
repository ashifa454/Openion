<?php include('database/connection.php'); session_start(); ?>
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Search | Lokvishay</title>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="../assets/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../assets/css/style.css">
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
    <link rel="stylesheet" href="../assets/css/search.css">
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
             <div id='search-box'>
<form action='/search' id='search-form' method='get' target='_top'>
<input id='search-text' name='q' placeholder='Vishay . . .' type='text' oninput="showresult(this);" autocomplete="off" />
<button id='search-button' type='submit'> 
<span>Search</span>
</button>
</form>
</div><hr/>
<center><div class="mdl-spinner mdl-js-spinner is-active" id="loading" style="display:none;"></div></center>
<div id="searchresult">
<center><div class='mdl-typography--display-1 mdl-typography--font-thin'>Write the title of vishay you want to search<br/></div></center>
</div>
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
    <script type="text/javascript">
      function showresult(val){
        var dataval={
          query:val.value
        };
        var container=$("#searchresult"); 
        if(val.value.length>3){
        $("#loading").attr("style","");
        dataval=$(this).serialize()+"&"+$.param(dataval);
          $.ajax({
            url:"../control/search.php",
            type:"json",
            method:"post",
            data:dataval,
            success:function(data){
              if(data.length>4){
              container.empty();
              var json = $.parseJSON(data);
                  for(var i=0;i<json.length;i++){
                    container.append("<section class='section--center mdl-grid mdl-grid--no-spacing mdl-shadow--2dp'><header class='section__play-btn mdl-cell mdl-cell--3-col-desktop mdl-cell--2-col-tablet mdl-cell--4-col-phone mdl-color--teal-100 mdl-color-text--white' style='"+json[i].url+"'></header><div class='mdl-card mdl-cell mdl-cell--9-col-desktop mdl-cell--6-col-tablet mdl-cell--4-col-phone'><div class='mdl-card__title'><a href='showPet?petId='.$rst['p_id'].'' style='text-decoration:none;color:black;''><h4 class='mdl-card__title-text'>"+json[i].Patetion_title+"</h4></a></div><p style='padding:10px; min-height:50px;'>"+json[i].description+"<a href='showPet?petId="+json[i].id+"' style='text-decoration:none;'> Read More</a></p><div class='mdl-card__actions'><a href='#' class='mdl-navigation__link' style='float:right;''>@"+json[i].target_name+" ("+json[i].target_identity+")</a></div><div class='mdl-card__menu'><button class='mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect'><i class='material-icons' style='color:#000000;'>share</i></button></div></div><div></div></section><br/>");
                  }
              }
              else{
                container.empty();
                container.append("<center><div class='mdl-typography--display-1 mdl-typography--font-thin'>No vishay found, start a vishay now<br/><a class='mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored pull-right mdl-color--blue-400' href='start-patetion.php?id=1' id='signupbtn'><i class='material-icons'>chevron_right</i></a></div></center>");
              }
            },
            complete:function(){
              $("#loading").attr("style","display:none");      
            }
          });
          }
          else if(val.value.length>0){
            container.empty();
             $("#loading").attr("style","");
          } else if(val.value.length==0){
              $("#loading").attr("style","display:none"); 
              container.append("<center><div class='mdl-typography--display-1 mdl-typography--font-thin'>Write the title of vishay you want to search<br/></div></center>");      
          }      
      }
    </script>
  </body>
</html>