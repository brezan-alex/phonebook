<?php
session_start();
if(isset($_SESSION['userUid'])&&$_SESSION['userUid']=='admin'){
if(isset($_POST['editinfo'])){
	require 'dbh.php';
	$fname=$_POST['fname'];
	$lname=$_POST['lname'];
	$phone=$_POST['phone'];
	$addres=$_POST['addres'];
	$city=$_POST['city'];
	$email=$_POST['email'];
	
	if(empty($fname) or empty($lname) or empty($phone) or empty($addres) or empty($city) or empty($email)){
		header("Location: ../edit.php?error=emptyfields&fname=".$fname."&lname=".$lname."&phone=".$phone."&addres=".$addres."&city=".$city."&email=".$email);
		exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL) and !preg_match("/^[a-zA-Z]*$/",$fname) and !preg_match("/^[a-zA-Z]*$/",$lname) and is_numeric($phone)){
		header("Location: ../edit.php?error=invalid4");
		exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../edit.php?error=invalidmail&fname=".$fname."&lname=".$lname."&phone=".$phone."&addres=".$addres."&city=".$city);
		exit();
	}else if(!preg_match("/^[a-zA-Z]*$/",$fname)){
		header("Location: ../edit.php?error=invalidfname&lname=".$lname."&phone=".$phone."&addres=".$addres."&city=".$city."&email=".$email);
		exit();
	}else if(!preg_match("/^[a-zA-Z]*$/",$lname)){
		header("Location: ../edit.php?error=invalidlname&fname=".$fname."&phone=".$phone."&addres=".$addres."&city=".$city."&email=".$email);
		exit();
	}else{
		$sql="SELECT phone FROM phonebook WHERE phone=?";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../edit.php?error=sqlerror");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt, "s", $phone);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0 || !preg_match('/^\d{10}$/', $phone)){
				header("Location: ../edit.php?error=phoneis&fname=".$fname."&lname=".$lname."&phone=".$phone."&addres=".$addres."&city=".$city."&email=".$email);
				exit();
			}else{
				$sql="SELECT email FROM phonebook WHERE email=?";
				$stmt=mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../edit.php?error=sqlerror");
					exit();
				}else{
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0){
					header("Location: ../edit.php?error=emailis&fname=".$fname."&lname=".$lname."&phone=".$phone."&addres=".$addres."&city=".$city."&email=".$email);
					exit();
			}else{
				$sql="UPDATE `phonebook` (`fname`, `lname`, `phone`, `addres`, `city`, `email`) VALUES (?,?,?,?,?,?)";
				$stmt=mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../edit.php?error=sqlerror");
					exit();
				}else{
					mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $phone, $addres, $city, $email);
					mysqli_stmt_execute($stmt);
					header("Location: ../edit.php?edit=success");
					exit();
				}
			}
		}
	}
	}
	}
	mysqli_stmt_close($stmt);
	mysqli_close($conn);
}else{
	header("Location: ../edit.php?edit=wentwrong");
	exit();
}
}
else{
	header("Location: ../edit.php?youarenot=admin");
	exit();
		}
