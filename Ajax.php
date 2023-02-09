<?php



$q = intval($_GET['q']);
$page = $_GET['act'];

switch($page){
	case 'dies':
	$q = intval($_GET['q']);
	diesa($q);
	break;
	
	case 'reso':
	$q = intval($_GET['q']);
	resoce($q);
	break;



}

function diesa($q){
include 'emg_admin/config.php';
if(!$q==0){


$stmt = $db->runQuery("SELECT * FROM disease WHERE id  = :anim_id");
$stmt->execute(array(":anim_id" => $q));
$row = $stmt->fetch(PDO::FETCH_ASSOC);


echo "<tr><th> Disease</th><td> <strong>". $row['disease'] . "</strong></td></tr>";
echo "<tr><th> Description</th><td>" . $row['description'] ."</td></tr>";
echo "<tr><th> Symptoms</th><td> ". $row['symptoms'] ."</td></tr>";
echo "<tr><th> Prevention</th><td>" . $row['prevention'] ."</td></tr>";
echo "<tr><th> Treatment</th><td> ". $row['treatment'] ."</td></tr>";
  

//"</table>";
}else{ //echo"bbbbbb";
}

}



function resoce($q){
if(!$q==0){

include 'emg_admin/config.php';
$stmt = $db->runQuery("SELECT * FROM resour_center WHERE id  = :res_id");
$stmt->execute(array(":res_id" => $q));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

echo  $row['description'] ;
  

}else{ //echo"bbbbbb";
}

}


?>