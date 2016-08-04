<?php
include '../database/connection.php';
$name=$_POST['name'];
$mobile=$_POST['mobile'];
$email=$_POST['email'];
$password=$_POST['password'];
$cm=new ConnectionManager();
$cm->connectConnection();
$result=$cm->getCount('SELECT * FROM user where email_id="'.$email.'" OR mobile="'.$mobile.'"');
if($result>0){
echo json_encode('UA');
}
else{
$ref=$cm->insertQuery('INSERT INTO `user`(`Name`, `email_id`, `password`, `mobile`) VALUES ("'.$name.'","'.$email.'","'.$password.'","'.$mobile.'")');
if(isset($ref)){
	session_start();
	$_SESSION['name']=$name;
	$_SESSION['user']=$ref;
	echo json_encode('VI');
}
}
$cm->closeConnection();
?>