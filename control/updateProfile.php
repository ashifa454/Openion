<?php
include '../database/connection.php';
session_start();
$DOB=$_POST['DOB'];
$Occupation=$_POST['OCC'];
$OccupationPlace=$_POST['OCCPLACE'];
$ADDRESS=$_POST['Address'];
$zip=$_POST['PIN'];
$date=date_create($DOB);
$cm=new ConnectionManager();
$cm->connectConnection();
$ref=$cm->insertQuery('UPDATE `profile` SET `DOB`="'.$DOB.'",`OCC`="'.$Occupation.'",`OPLACE`="'.$OccupationPlace.'",`ADDRESS`="'.$ADDRESS.'",`ZIP`="'.$zip.'" WHERE u_id='.$_SESSION['user'].'');
if(isset($ref)){
	echo json_encode('VI');
}
$cm->closeConnection();
?>