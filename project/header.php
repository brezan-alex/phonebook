<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<link rel="stylesheet" type="text/css" href="style.css">
		<title>Phonebook</title>
	</head>
<body>
	<header>
			<div class="nav">
				<a href="index.php"><img src="img/phone.png" alt="phone" id="logo"></a>
				<a href="index.php">Home</a>
				<a href="phonebook.php">Phonebook</a>
				<a href="upload.php">Upload</a>
				<?php
				if(isset($_SESSION['userId'])){
					if($_SESSION['userUid']=='admin'){
							echo '<a href="userdelete.php">Users</a>';
				}}
				?>
				<!-- <a href="../laborator">Lab projects</a>
				<a href="../media/media.php">Calculeaza media</a> -->
			</div>
			<div class="log">
				<?php
					if(isset($_SESSION['userId'])){
						echo '<form action="php/logout.php" method="post">
						<button type="submit" name="logout-submit">Logout</button>
						</form>';
					}else{
						echo '<form action="php/login.php" method="post">
						<input type="text" name="mailuser" placeholder="Username">
						<input type="password" name="passw" placeholder="Password">
						<button type="submit" name="login-submit">Login</button>
						</form><p>If you don\'t have an account <a href="signup.php">register</a> here</p>';
						}
				?>
			</div>
	</header>