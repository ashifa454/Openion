<?php
function getRenderedHTML($path)
{
    ob_start();
    include($path);
    $var=ob_get_contents(); 
    ob_end_clean();
    return $var;
}
session_start();
if(!isset($_SESSION['user'])){
echo getRenderedHTML("view/Features/login.php");
}
else{
	header('Location:index');
}
?>