<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Introducing Lollipop, a sweet new take on Android.">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
    <title>Openion | Korridor India</title>

    <!-- Page styles -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:regular,bold,italic,thin,light,bolditalic,black,medium&amp;lang=en">
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    <link rel="stylesheet" href="https://code.getmdl.io/1.1.3/material.min.css">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
    <link href="../assets/font-awesome.min.css" rel="stylesheet">
  <link rel="stylesheet" href="http://localhost/korridor/assets/css/style.css">
   </head>
  <body>
    <div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
      <?php include '../components/general/header.php'; ?>
        <?php include '../components/general/drawer.php'; ?> 

      <div class="android-content mdl-layout__content">
        
        <!--Main Form!-->
        <div class="android-wear-section">
            <div class="android-wear-band">
            <div class="android-wear-band-text mdl-shadow--4dp">
              <div class="mdl-typography--display-2 mdl-typography--font-thin mdl-typography--text-center">Your Patetion is All Set.</div>
                <p class="mdl-typography--font-light mdl-typography--subhead">
                  Congratulation your Patetion is Ready to Flow on Korridor Network, Once our representative will go through this patetion and will autorise it it will start showing on 'PLATFOR NAME'. 
              </p>
              <div class="mdl-cell mdl-cell--12-col mdl-color--accen mdl-cell--12-col-phone" style="border:dashed 2px #AAA4A4;" id="display">
            <h3 class="mdl-typography--display-1 mdl-typography--font-bold mdl-typography--text-center">
              <?php session_start(); echo $_SESSION['title']."."; ?>
              </h3>
              <div class="mdl-cell mdl-cell--12-col mdl-color--accen mdl-cell--12-col-phone" style="min-height:240px;background-image:url('../assets/Raw/13-eOzsR8Pk3TE.jpg');background-size:cover;">
              </div>
                <p>
                  <?php ?>
                </p>
                  </div>
                 <div>

    <form action="../control/start-Patetion/regPatetion?id=6" method="post">
                 <button type="button" id="show-btn" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--blue-400">
                 <i class="material-icons">edit</i>
                 </button>              
                 <button type="button" id="picture" class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored mdl-color--blue-400"><i class="material-icons">share</i></button>
               <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect mdl-button--colored pull-right mdl-color--orange-400" id="donept" type="submit">
            <i class="material-icons">home</i>
        </button>

    </form>
                </div>
 
              <ul class="mdl-list">
              <p class="mdl-typography--headline mdl-typography--font-thin ">
                Tips to get more eyes on your patetion.
              </p>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Share your patetion via online medium</span>
      <span class="mdl-list__item-text-body">
       Click on share Button and copy the link of your patetion to share on any medium.
      </span>
    </span>
    
  </li>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Discuss about your Patetion in Public or your Circle</span>
      <span class="mdl-list__item-text-body">
       Plan Debate or general Discussion on your patetion to make people inform about your problem and ask them for support your army.
      </span>
    </span>
    </li>
  <li class="mdl-list__item mdl-list__item--three-line">
    <span class="mdl-list__item-primary-content">
      <span>Suppor always a right side.</span>
      <span class="mdl-list__item-text-body">
        Always be in right team and beleive in our constitution.
      </span>
    </span>
    
  </li>
</ul>
<p>
              </p>
            </div>
          </div>
        </div>
         <?php include '../components/general/footer.php'; ?>
      </div>
    </div>
    <dialog class="mdl-dialog">
    <h4 class="mdl-dialog__title">Embed Video</h4>
    <div class="mdl-dialog__content">
      <p>
      <form action="#">
  <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-cell mdl-cell--12-col">
    <input class="mdl-textfield__input" type="text" id="emlink" placeholder="https://">
    <label class="mdl-textfield__label" for="sample3">URL</label>
  </div>
  <span>Copy and Paste the Embed Link of Video that you want to add with your petetion</span>
</form>
      </p>
    </div>
    <div class="mdl-dialog__actions">
      <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--green-600" id="add">Add</button>
      <button type="button" class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-color--red-600 close">Close</button>
    </div>
  </dialog>
  <div class="mdl-tooltip" for="show-btn">
    Edit Your Patetion.
  </div>
    <div class="mdl-tooltip" for="picture">
    Click here to Share Your Patetion.
  </div>
    <div class="mdl-tooltip" for="donept">
    All Set Go to Home Page.
  </div>
  </body>
    <script src="https://code.getmdl.io/1.1.3/material.min.js"></script>
   <script>
    var dialog = document.querySelector('dialog');
    var showDialogButton = document.querySelector('#show-btn');
    if (! dialog.showModal) {
      dialogPolyfill.registerDialog(dialog);
    }
    showDialogButton.addEventListener('click', function() {
      dialog.showModal();
    });
    dialog.querySelector('.close').addEventListener('click', function() {
      dialog.close();
    });
    dialog.querySelector('#add').addEventListener('click',function(){
      videoid=$("#emlink").val().split("?");
      id=videoid[1].substring(2,videoid[1].length);
      var container=document.getElementById("display");
      container.setAttribute("style","background-image:url('http://img.youtube.com/vi/"+id+"/mqdefault.jpg') ;min-height:350px;border:dashed 2px #AAA4A4;background-size:cover;");
      document.querySelector("#ULINK").setAttribute("value",id);
    });
  document.querySelector('#picture').addEventListener('click',function(){
    document.querySelector('#ptimg').click();
  });
  </script>
  <script type="text/javascript">
    function readURL(input){
      var Reader=new FileReader();
      var container=document.getElementById("display");
      container.setAttribute("style","background-image:url('"+URL.createObjectURL(input.files[0])+"') ;min-height:350px;border:dashed 2px #AAA4A4;background-size:cover;");
    }
  </script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.2/jquery.min.js"></script>  
</html>
