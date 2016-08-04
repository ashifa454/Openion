<?php
include '../database/connection.php';
$username=$_POST['username'];
$password=$_POST['password'];
$cm=new ConnectionManager();
$cm->connectConnection();
$result=$cm->selectQuery('SELECT * FROM user where email_id="'.$username.'" AND password="'.$password.'"');
$cm->closeConnection();
foreach($result as $rst){
	$id=$rst['id'];
}
session_start();
if(isset($id)){
$_SESSION['user']=$id;
echo json_encode(count($result));
}else{
echo json_encode(0);	
}
?>