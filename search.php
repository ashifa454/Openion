<?php
function getRenderedHTML($path)
{
    ob_start();
    include($path);
    $var=ob_get_contents(); 
    ob_end_clean();
    return $var;
}
echo getRenderedHTML('view/Features/search.php');
?>