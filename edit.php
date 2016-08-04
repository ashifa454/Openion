<?php
session_start();
$callingid=$_GET['id'];
if(isset($_GET['p_id']))
{$_SESSION['changeid']=$_GET['p_id'];}
switch ($callingid) {
	case 1:
		echo getRenderedHTML("view/edit-Pet/firstPage.php");
		break;
	case 2:
		echo getRenderedHTML("view/edit-Pet/secondPage.php");
		break;
	case 3:
		echo getRenderedHTML("view/edit-Pet/thirdPage.php");
		break;
	case 4:
		echo getRenderedHTML("view/edit-Pet/fourthPage.php");
		break;
	case 5:
			echo getRenderedHTML("edit-Pet/fifthPage.php");
		break;
	case 6:
			echo getRenderedHTML("edit-Pet/SuccessfulPetReg.php");
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