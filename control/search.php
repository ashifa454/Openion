<?php
include '../database/connection.php';
$query=$_POST['query'];
$cm=new ConnectionManager();
$cm->connectConnection();
$result=$cm->selectQuery('SELECT * From Patetion,description where Patetion.Patetion_title LIKE "%'.$query.'%" AND Patetion.id=description.p_id AND Patetion.is_available=1 LIMIT 7');
$finalresult;
$i=0;
foreach ($result as $key) {
	$datacontainer=new dataResult();
	$datacontainer->id=$key[0];
	$datacontainer->Patetion_title=$key[2];
	$datacontainer->target_name=$key[4];
	$datacontainer->target_identity=$key[5];
	$datacontainer->description=$key[9];
	$finalresult[$i]=$datacontainer;
	if(file_exists('../assets/Raw/'.$rst['p_id'].'.jpg')){
                   $datacontainer->url="../assets/Raw/".$key[0].".jpg); background-size:cover;";
                    }
                    else{
                      $filename = "../assets/Raw/".$key[0]."-*";
                        $rs=glob($filename);
                        $rs=split("-",$rs[0]);
                        $rs=substr($rs[1],0,count($rs[1])-5);
                        $datacontainer->url="background-image:url(http://img.youtube.com/vi/".$rs."/hqdefault.jpg); background-size:cover;";
                      }
	$i++;
}
echo json_encode($finalresult);
class dataResult{
	var $id;
	var $Patetion_title;
	var $target_name;
	var $target_identity;
	var $description;
	var $url;
}
?>