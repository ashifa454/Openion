<?php
function getRenderedHTML($path)
{
    ob_start();
    include($path);
    $var=ob_get_contents(); 
    ob_end_clean();
    return $var;
}
$callingId=$_GET['id'];
switch ($callingId) {
	case 1:
		if(session_id()){
		session_unset();
		session_destroy();
		}
		else{
		}
		echo getRenderedHTML("view/Features/signup.php");
		break;
	case 2:
		session_start();
		if(isset($_SESSION['name'])){
		echo getRenderedHTML("view/Features/profileNew.php");
		}
		else{
			header('Location:index');		
		}
		break;
	default:
		# code...
		break;
}
?>