<?php
include "../init.php";
if($getFromU->loggedIn()==false){
header("Location: ../../index.php");
}
if (isset($_GET['allstat']) && !empty($_GET['allstat'])){
	$userstatus = $getFromU->userData($_SESSION['user_id']);
	echo $userstatus->engine."*#".$userstatus->doors."*#".$userstatus->headlight."*#".$userstatus->windows."*#".$userstatus->alarm."*#".$userstatus->battery."*#".$userstatus->pressure;
}
?>