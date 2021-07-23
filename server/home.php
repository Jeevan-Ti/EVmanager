<?php
include "core/init.php";
if($getFromU->loggedIn()==false){
header("Location: index.php");
}
$user_id = $_SESSION['user_id'];
$user = $getFromU->userData($user_id);

if (isset($_POST['engineoff']) && !empty($_POST['engineoff'])) {
	$id = $_SESSION['user_id'];
	$getFromU->update('users',$id,array('engine' => '0'));
	echo '<script>alert("Engine is Off.");</script>';
	header("Refresh: 0");
}

if (isset($_POST['engineon']) && !empty($_POST['engineon'])) {
	$id = $_SESSION['user_id'];
	$getFromU->update('users',$id,array('engine' => '1'));
	echo '<script>alert("Engine is On.");</script>';
	header("Refresh: 0");
}

if (isset($_POST['doorlock']) && !empty($_POST['doorlock'])) {
	$id = $_SESSION['user_id'];
	$getFromU->update('users',$id,array('doors' => '1'));
	echo '<script>alert("Doors Are Locked.");</script>';
	header("Refresh: 0");
}

if (isset($_POST['doorunlock']) && !empty($_POST['doorunlock'])) {
	$id = $_SESSION['user_id'];
	$getFromU->update('users',$id,array('doors' => '0'));
	echo '<script>alert("Doors Are Un-Locked.");</script>';
	header("Refresh: 0");
}

if (isset($_POST['headon']) && !empty($_POST['headon'])) {
	$id = $_SESSION['user_id'];
	$getFromU->update('users',$id,array('headlight' => '1'));
	echo '<script>alert("Headlights Are On.");</script>';
	header("Refresh: 0");
}

if (isset($_POST['headof']) && !empty($_POST['headof'])) {
	$id = $_SESSION['user_id'];
	$getFromU->update('users',$id,array('headlight' => '0'));
	echo '<script>alert("HeadLights Are Off.");</script>';
	header("Refresh: 0");
}

if (isset($_POST['windowsopen']) && !empty($_POST['windowsopen'])) {
	$id = $_SESSION['user_id'];
	$getFromU->update('users',$id,array('windows' => '0'));
	echo '<script>alert("Windows Are Open.");</script>';
	header("Refresh: 0");
}

if (isset($_POST['windowsclose']) && !empty($_POST['windowsclose'])) {
	$id = $_SESSION['user_id'];
	$getFromU->update('users',$id,array('windows' => '1'));
	echo '<script>alert("Windows Are Closed.");</script>';
	header("Refresh: 0");
}

if (isset($_POST['alarmon']) && !empty($_POST['alarmon'])) {
	$id = $_SESSION['user_id'];
	$getFromU->update('users',$id,array('alarm' => '1'));
	echo '<script>alert("Alarm is Ringing.");</script>';
	header("Refresh: 0");
}

if (isset($_POST['alarmoff']) && !empty($_POST['alarmoff'])) {
	$id = $_SESSION['user_id'];
	$getFromU->update('users',$id,array('alarm' => '0'));
	echo '<script>alert("Alarm is Off.");</script>';
	header("Refresh: 0");
}

?>
<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
	<script type="text/javascript" src="assets/js/script.js"></script>
	<title>Jeevan</title>
</head>
<body onload="getdata()">  

	<div id="wrapper">
		<div id="header">
			<div id="hello">
				
			</div>
			<div id="hello">
				<h2>Hey! <?php echo $user->name; ?></h2>
			</div>
			<div id="hello">
				<p>It's Good to See You..</p>
			</div>
		</div>
		<div class="block" id="engine">
			<div class="name">
				<h3>Engine</h3>
			</div>
			<div class="name">
				<h1 id="enginestat">----</h1>
			</div>
			<div class="name">
				<form method="POST" action=""><input id="engtoff" class="submit" type="submit" name="engineoff" value="Turn it Off"></form>
				<form method="POST" action=""><input id="engton" class="submit" type="submit" name="engineon" value="Turn it On"></form>
				
			</div>
		</div>
		<div class="block" id="door">
			<div class="name">
				<h3>Doors</h3>
			</div>
			<div class="name">
				<h1 id="doorstat">----</h1>
			</div>
			<div class="name">
				<form method="POST" action=""><input id="doorl" class="submit" type="submit" name="doorlock" value="Lock Them"></form>
				<form method="POST" action="">
				<input id="doorun" class="submit" type="submit" name="doorunlock" value="Un-Lock Them"></form>
			</div>
		</div>
		<div class="block" id="headlight">
			<div class="name">
				<h3>HeadLights</h3>
			</div>
			<div class="name">
				<h1 id="headlightstat" >----</h1>
			</div>
			<div class="name">
				<form method="POST" action="">
				<input id="hlon" class="submit" type="submit" name="headon" value="Turn Them On"></form>
				<form method="POST" action=""><input id="hlof" class="submit" type="submit" name="headof" value="Turn Them Off"></form>
			</div>
		</div>
		<div class="block" id="windows">
			<div class="name">
				<h3>Windows</h3>
			</div>
			<div class="name">
				<h1 id="windowstat">----</h1>
			</div>
			<div class="name">
				<form method="POST" action="">
				<input id="wof" class="submit" type="submit" name="windowsclose" value="Close Them"></form>
				<form method="POST" action=""><input id="won" class="submit" type="submit" name="windowsopen" value="Open Them"><form method="POST" action="">
			</div>
		</div>
		<div class="block" id="alarm">
			<div class="name">
				<h3>Alarm</h3>
			</div>
			<div class="name">
				<h1 id="alarmstat">----</h1>
			</div>
			<div class="name">
				<form method="POST" action="">
				<input id="ral" class="submit" type="submit" name="alarmon" value="Ring Alarm"></form>
				<form method="POST" action=""><input id="sal" class="submit" type="submit" name="alarmoff" value="Turn Off Alarm"><form method="POST" action="">
			</div>
		</div>
		<div class="block" id="battery">
			<div class="name">
				<h3>Battery</h3>
			</div>
			<div class="name">
				<h1 id="batterystat">----</h1>
			</div>
			
		</div>
		<div class="block" id="pressure">
			<div class="name">
				<h3>Pressure</h3>
			</div>
			<div class="name">
				<h1 id="pressurestat">----</h1>
			</div>
			
		</div>
	</div>
</body>
</html>