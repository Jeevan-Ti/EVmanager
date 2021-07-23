<?php
include "core/init.php";
if (isset($_POST['engineoff']) && !empty($_POST['engineoff'])) {
	$cid = $_POST['cid'];
	$getFromU->apiupdate('users',$cid,array('engine' => '0'));
	echo '0';
}

if (isset($_POST['getalldata']) && !empty($_POST['getalldata'])){
	$cid = $_POST['cid'];
	$userstatus = $getFromU->userDataByCID($cid);
	echo $userstatus->engine."*#".$userstatus->doors."*#".$userstatus->headlight."*#".$userstatus->windows."*#".$userstatus->alarm."*#".$userstatus->battery."*#".$userstatus->pressure;
}

if (isset($_POST['updatealldata']) && !empty($_POST['updatealldata'])){
	$cid = $_POST['cid'];
	$engine = $_POST['engine'];
	$doors = $_POST['doors'];
	$hls = $_POST['hls'];
	$windows = $_POST['windows'];
	$alarm = $_POST['alarm'];
	$battery = $_POST['battery'];
	$pressure = $_POST['pressure'];
	$getFromU->apiupdate('users',$cid,array('engine' =>$engine,'doors'=>$doors,'headlight'=>$hls,'windows'=>$windows,'alarm'=>$alarm,'battery'=>$battery,'pressure'=>$pressure));
}
?>