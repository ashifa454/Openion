<?php
$callingid=$_GET['id'];
session_start();
switch ($callingid) {
	case 1:
		if(isset($_SESSION['user'])){
		echo getRenderedHTML("view/Register-Pet/firstPage.php");
	}
		else{
			echo getRenderedHTML("view/Features/login.php");
		}
		break;
	case 2:
		if(isset($_SESSION['title'])){
		echo getRenderedHTML("view/Register-Pet/secondPage.php");
		}
		else{
			header("Location: index");
		}
		break;
	case 3:
		if(isset($_SESSION['post'])){
		echo getRenderedHTML("view/Register-Pet/thirdPage.php");
		}
		else{
			header("Location: index");
		}
		break;
	case 4:
		if(isset($_SESSION['current_id'])){
		echo getRenderedHTML("view/Register-Pet/fourthPage.php");
		}else{
			header("Location: index");
		}
		break;
	case 5:
			echo getRenderedHTML("view/Register-Pet/fifthPage.php");
		break;
	case 6:
		if(isset($_SESSION['current_id'])){
			echo getRenderedHTML("view/Register-Pet/SuccessfulPetReg.php");
		}
		else{
			header("Location: index");
		}
		break;
	default:
		# code...
		break;
}
function getRenderedHTML($path)
{
    ob_start();
    include($path);
    $var=ob_get_contents(); 
    ob_end_clean();
    return $var;
}
?>