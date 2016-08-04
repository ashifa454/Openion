<?php
include('../../database/connection.php');
$callid=$_GET['id'];
session_start();
if(isset($_SESSION['user'])){
switch ($callid) {
	case 1:
			$_SESSION['title']=$_POST['title'];
			header('Location: ../../start-patetion?id=2');
	break;
	case 2:
			$_SESSION['decisionHolder']=$_POST['target'];
			header('Location: http://localhost/korridor/view/start-patetion?id=3');
		break;
	case 4:
			$_SESSION['decisionHolder']=$_GET['target'];
			$_SESSION['post']=$_GET['post'];
				header('Location: ../../start-patetion?id=3');
		break;
	case 3:
	date_default_timezone_set("Asia/Kolkata");
		$_POST['body'];
		$cm=new ConnectionManager();
		$cm->connectConnection();
		$title=$_SESSION['title'];
		$var="INSERT INTO `korridor`.`Patetion`(`user_id`, `Patetion_title`, `date_time`,`target_name`,`target_identity`) VALUES (".$_SESSION['user'].",'".$title."','".date('Y-m-d H:i:s')."','".$_SESSION['decisionHolder']."','".$_SESSION['post']."')";
		$id=$cm->insertQuery($var);
		$myfile = fopen($id."_patetion.txt", "w") or die("UNABLE TO OPEN");
		if(fwrite($myfile, $_POST['body'])){
			$ans=str_split($_POST['body'],200);
					$var2="INSERT INTO `description`(`Description`, `p_id`) VALUES ('".strip_tags(implode($ans))."',".$id.")";
					$id2=$cm->insertQuery($var2);
					header('Location: ../../start-patetion?id=5');
		}
		$cm->closeConnection();
		$_SESSION['current_id']=$id;
		break;
	case 5:
		if(isset($_POST['URLLINK'])&&strlen($_POST['URLLINK'])>0){
			$content = file_get_contents('http://img.youtube.com/vi/'.$_POST['URLLINK'].'/0.jpg');
			$fp = fopen("../../assets/Raw/".$_SESSION['current_id']."-".$_POST['URLLINK'].".jpg", "w");
			fwrite($fp, $content);
			fclose($fp);
			unset($_SESSION['title']);
			unset($_SESSION['decisionHolder']);
			unset($_SESSION['post']);
			unset($_SESSION['current_id']);
				header('Location: ../../start-patetion?id=6');
		}
		elseif(isset($_FILES['petImage'])){
			move_uploaded_file($_FILES['petImage']['tmp_name'],"../../assets/Raw/".$_SESSION['current_id'].".jpg");
				header('Location: ../../start-patetion?id=6');
		}
		break;
	case 6:

		break;
	default:
		# code...
		break;
}	
}
else{
	header("Location: ../../index");
}
?>