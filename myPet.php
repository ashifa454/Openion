<?php
session_start();
function getRenderedHTML($path)
{
    ob_start();
    include($path);
    $var=ob_get_contents(); 
    ob_end_clean();
    return $var;
}
if(isset($_SESSION['user'])){
echo getRenderedHTML("view/Features/myPet.php");
}
else{
	header("Location:index.php");
}
?>