<?php
$xmlDoc=new DOMDocument();
$xmlDoc->load("../assets/Raw/links.xml");
$x=$xmlDoc->getElementsByTagName('link');
//get the q parameter from URL
$q=$_GET["q"];
//lookup all links from the xml file if length of q>0
if (strlen($q)>0) {
  $hint="";
  $hint="<h6>Suggestion</h6>";
  for($i=0; $i<3; $i++) {
    $y=$x->item($i)->getElementsByTagName('title');
    $z=$x->item($i)->getElementsByTagName('url');
    if ($y->item(0)->nodeType==1) {
      $text1=$y->item(0)->childNodes->item(0)->nodeValue;
      $text2=$z->item(0)->childNodes->item(0)->nodeValue;
      //find a link matching the search text
      if (stristr($y->item(0)->childNodes->item(0)->nodeValue,$q)) {
        if ($hint=="") {
          $hint="<a href='../control/modifypatetion?id=4&&target=".$text1."&&post=".$text2."' style='text-decoration:none;'><li class='mdl-list__item mdl-list__item--two-line'>
          <span class='mdl-list__item-primary-content suggestion'><i class='material-icons mdl-list__item-icon'>person</i><span>".$text1."</span>
          <span class='mdl-list__item-sub-title'>".$text2e."</span>
          </span>
          </li></a>";
        } 
        else {
          $hint=$hint."<a href='../control/modifypatetion?id=4&&target=".$text1."&&post=".$text2."' style='text-decoration:none;'><li class='mdl-list__item mdl-list__item--two-line'>
          <span class='mdl-list__item-primary-content suggestion'>
          <i class='material-icons mdl-list__item-icon'>person</i><span>".$text1."</span>
          <span class='mdl-list__item-sub-title'>".$text2."</span>
          </span>
          </li></a>";
        }
      }
    }
  }
}

// Set output to "no suggestion" if no hint was found
// or to the correct values
if ($hint=="") {
  $response="no suggestion";
} else {
  $response=$hint;
}

//output the response
echo $response;
?>