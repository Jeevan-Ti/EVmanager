<?php
include "core/init.php";
if($getFromU->loggedIn()==true){
header("Location: home.php");
}

if(isset($_POST['login']) && !empty($_POST['login'])){
$id = $getFromU->checkInput($_POST['id']);
$password = $getFromU->checkInput($_POST['password']);
if(!empty($password) && !empty($id)){
	$status = $getFromU->login($id,md5($password));
	if($status==true){
	header("Location: home.php");
	}else{
	echo '<script>alert("Invalid Credentials..!")</script>';
	header("Refresh: 0");
}

}else{
echo '<script>alert("All Fields are Required..!")</script>';
header("Refresh: 0");
}
	
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
<body style="background-image: url('assets/images/car.jpg'); background-repeat: no-repeat; background-position: center; background-size: cover;"> 
	<div id="wrapper">
		<div id="logo">
			<img src="assets/images/logo.png">
		</div>
		<div id="login-cont">
			<form action="" method="POST">
			<input type="text" name="id" id="input" placeholder="Enter Id"><br>
			<input type="Password" name="password"  id="input" placeholder="Enter Password"><br>
			<input type="submit" name="login"  id="good-button" value="login"><br>
		</form>
		</div>
	</div>
</body>
</html>