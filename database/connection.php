<?php
class ConnectionManager{
	var $database_pass;
	var $database_user;
	var $database_host;
	var $database_name;
	var $conn;
function __construct(){
	$database_host="127.0.0.1";	
	$database_user="root";
	$database_pass='';
	$database_name="korridor";
}
function connectConnection(){
	$this->conn=mysqli_connect("182.50.133.85:3306","korridor_root","ghT28z!5","korridor");

	if(!$this->conn){
	die('connection Failed'.mysql_error());
	}
}
function closeConnection(){
	mysqli_close($this->conn);
}
function insertQuery($query){
	if(mysqli_query($this->conn,$query)){
		return mysqli_insert_id($this->conn);
	}
	else{
		echo mysqli_error($this->conn);
	}
}
function selectQuery($query){
	$result=mysqli_query($this->conn,$query);
	if($result){
		$rows = [];
		while($row = mysqli_fetch_array($result))
		{
    		$rows[] = $row;
		}
		return $rows;
	}
}
function getCount($query){
	$result=mysqli_query($this->conn,$query);
	if($result){
		return mysqli_num_rows($result);
	}
}
function updataQuery($query){
$result=mysqli_query($this->conn,$query);
	if($result){
		return 1;
	}
}
function getSupport($query){
	$result=mysqli_query($this->conn,$query);
	if($result){
		$rst=mysqli_fetch_array($result);
		return $rst['support'];
	}
}
}
?>