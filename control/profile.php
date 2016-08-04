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
$ref=$cm->insertQuery('INSERT INTO `profile`(`u_id`, `DOB`, `OCC`, `OPLACE`, `ADDRESS`, `ZIP`) VALUES ('.$_SESSION['user'].',"'.date_format($date,"Y-m-d").'","'.$Occupation.'","'.$OccupationPlace.'","'.$ADDRESS.'","'.$zip.'")');
if(isset($ref)){
	echo json_encode('VI');
}
$cm->closeConnection();
?>