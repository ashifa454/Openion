<?php if(isset($_SESSION['user'])){
  $cm=new ConnectionManager();
            $cm->connectConnection();
 $result=$cm->selectQuery('SELECT * FROM user where id='.$_SESSION['user']); 
foreach($result as $res){
  $email=$res['email_id'];
  $email=split("@", $email,2);
echo '<div class="android-drawer mdl-layout__drawer"> 
        <span class="mdl-layout-title">
       		<h3>'.$res['Name'].'</h3>
          <p style="margin-top:125px;">@'.$email[0].'[at]'.$email[1].'</p>
        </span>
        <nav class="mdl-navigation">
          <a class="mdl-navigation__link" href="profile"><i class="material-icons">account_circle</i> Profile</a>
          <a class="mdl-navigation__link" href="myPet"><i class="material-icons">pages</i> My vishay</a>
          <a class="mdl-navigation__link" href="myopenion"><i class="material-icons">poll</i> My Openions</a>
          <a class="mdl-navigation__link" href=""><i class="material-icons">email</i> Contact us</a>
          <a class="mdl-navigation__link" href="../control/logout"><i class="material-icons">exit_to_app</i> Logout</a>
          <div class="android-drawer-separator"></div>
        </nav>
</div>';
}
$cm->closeConnection();
}