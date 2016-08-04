<?php
include('../database/connection.php');
$callid=$_GET['id'];
session_start();
$id=$_SESSION['changeid'];
if(isset($_SESSION['user'])){
switch ($callid) {
	case 1:
			$_SESSION['edit_title']=$_POST['title'];
			header('Location: ../edit?id=2');
	break;
	case 2:
			$_SESSION['edit_decisionHolder']=$_POST['target'];
			header('Location: ../edit?id=3');
		break;
	case 4:
			$_SESSION['edit_decisionHolder']=$_GET['target'];
			$_SESSION['edit_post']=$_GET['post'];
				header('Location: ../edit?id=3');
		break;
	case 3:
	date_default_timezone_set("Asia/Kolkata");
		$cm=new ConnectionManager();
		$cm->connectConnection();
		$title=addslashes($_SESSION['edit_title']);
		$var="UPDATE `Patetion` SET `Patetion_title`='".$title."',`target_name`='".$_SESSION['edit_decisionHolder']."',`target_identity`='".$_SESSION['edit_post']."' WHERE id=".$id."";
		$result=$cm->updataQuery($var);
		$file=fopen("start-Patetion/".$id."_patetion.txt","r");
			$file2=fopen("../assets/archieve/".$id."_".date("d-m-y H:i:s")."_patetion.txt","w") or die('UNABLE TO CREATE FILE');
			echo $file2;
			$rst=fwrite($file2,fread($file,filesize("start-Patetion/".$id."_patetion.txt")));
			if($rst){
			fclose($file);
			fclose($file2);
			$file=fopen("start-Patetion/".$id."_patetion.txt","w");
			if(fwrite($file,$_POST['body'])){
				fclose($file);
				$ans=str_split($_POST['body'],300);
					$var2="UPDATE `description` set `Description`='".strip_tags(implode($ans))."' WHERE `p_id`=".$id."";
					$id2=$cm->updataQuery($var2);
						header('Location: ../edit?id=5');
			}
		}
		$cm->closeConnection();
		$_SESSION['current_id']=$id;
		break;
	case 5:
		if(isset($_POST['URLLINK'])&&strlen($_POST['URLLINK'])>0){
			$content = file_get_contents('http://img.youtube.com/vi/'.$_POST['URLLINK'].'/0.jpg');
			$fp = fopen("../assets/Raw/".$_SESSION['current_id']."-".$_POST['URLLINK'].".jpg", "w");
			fwrite($fp, $content);
			fclose($fp);
				header('Location: ../myPet');
		}
		elseif(isset($_FILES['petImage'])){
			move_uploaded_file($_FILES['petImage']['tmp_name'],"../assets/Raw/".$_SESSION['current_id'].".jpg");
				header('Location: ../myPet');
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
	header("Location: http://localhost/korridor/view/index");
}
?>