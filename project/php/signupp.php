<?php
if(isset($_POST['signup-submit'])){
	require 'dbh.php';
	
	$username=$_POST['userid'];
	$email=$_POST['mail'];
	$password=$_POST['passw'];
	$passwordr=$_POST['passw-r'];
	
	if(empty($username) or empty($email) or empty($password) or empty($passwordr)){
		header("Location: ../signup.php?error=emptyfields&userid=".$username."&mail=".$email);
		exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL) and !preg_match("/^[a-zA-Z0-9]*$/",$username)){
		header("Location: ../signup.php?error=invalidmailuserid");
		exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../signup.php?error=invalidmail&userid=".$username);
		exit();
	}else if(!preg_match("/^[a-zA-Z0-9]*$/",$username)){
		header("Location: ../signup.php?error=invaliduserid&mail=".$email);
		exit();
	}else if($password !== $passwordr){
		header("Location: ../signup.php?error=passcheck&userid=".$username."&mail=".$email);
		exit();
	}else{
		$sql="SELECT uidUsers FROM users WHERE uidUsers=?";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../signup.php?error=sqlerror");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt, "s", $username);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0){
				header("Location: ../signup.php?error=usertaken&mail=".$email);
				exit();
			}else{
				$sql="INSERT INTO `users` (`uidUsers`, `emailUsers`, `pwdUsers`) VALUES (?,?,?)";
				$stmt=mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../signup.php?error=sqlerror");
					exit();
				}else{
					$hashedPwd=password_hash($password, PASSWORD_DEFAULT);
					mysqli_stmt_bind_param($stmt, "sss", $username, $email, $hashedPwd);
					mysqli_stmt_execute($stmt);
					header("Location: ../signup.php?signup=success");
					exit();
				}
			}
		}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
	
}else{
	header("Location: ../signup.php");
	exit();
}
