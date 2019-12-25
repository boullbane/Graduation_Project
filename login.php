<?php 
	session_start();
	require 'configs/db.php';
	if (isset($_SESSION['id'])){
		header('Location: dashboard.php');
	}
	else {
		if(isset($_POST['email']) && isset($_POST['password'])){
		$query = $db->query("SELECT * FROM users WHERE email = '".$_POST['email']."'
		AND password = '".$_POST['password']."'");
		$rows = $query->num_rows;
		if($rows > 0){
			$result = $query->fetch_assoc();
			$_SESSION['id'] = $result['user_id'];
			header("Location: dashboard.php");
		}
		else {
			echo "<p id='notfound'>this user does not exist !</p>";
		}
	}
	}
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Login to your account</title>
	<link rel="shortcut icon" href="images/Blogo.png">
	<link rel="stylesheet" href="css/login.css">
</head>
<body>
	<div class="container">
		<div class="left-side">
			<img src="images/Blond-Industrial-Design-Barrel-Thumb.jpg" alt="">
			<h1>Tips for taking better pictures</h1>
		</div>
		<div class="right-side">
			<div class="info-message">
				<p></p>
			</div>
			<form action="<?=$_SERVER['PHP_SELF'];?>" method="post">
				<h1>Log in to your account.</h1>
				<label for="">Type in your email</label>
				<input type="text" placeholder="john.doe@gmail.com" name="email" id="email">
				<label for="">Type in your password</label>
				<input type="password" placeholder="********" name="password" id="password">
				<button id="login" type="submit">Log in</button>
			</form>
		</div>
		<script src="bower_components/jquery/dist/jquery.min.js"></script>
		<script src="js/login.js"></script>
	</div>
</body>
</html>