<?php
include '../database/connection.php';
session_start();
date_default_timezone_set("Asia/Kolkata");
$reason=$_POST['reason'];
$petId=$_SESSION['current_id'];
$user=$_SESSION['user'];
$cm=new ConnectionManager();
$cm->connectConnection();
echo 'INSERT INTO `support`(`p_id`, `u_id`, `reason`, `date_time`) VALUES ('.$petId.','.$user.',"'.$reason.'",'.date('Y-m-d H:i:s').')';
$ref=$cm->insertQuery('INSERT INTO `support`(`p_id`, `u_id`, `reason`, `date_time`) VALUES ('.$petId.','.$user.',"'.$reason.'","'.date('Y-m-d H:i:s').'")');
if(isset($ref)){
	header('Location:../showPet?petId='.$petId);
}
$cm->closeConnection();
?>