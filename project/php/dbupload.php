<?php
if(isset($_POST['upload-submit'])){
	require 'dbh.php';
	
	$data = ['fname','lname','phone','addres','city','email'];
	for($i=0;$i<6;$i++){
		${$data[$i]}=htmlentities($_POST[$data[$i]], ENT_QUOTES, 'UTF-8');
	}

	
	if(empty($fname) or empty($lname) or empty($phone) or empty($addres) or empty($city) or empty($email)){
		header("Location: ../upload.php?error=emptyfields&fname=".$fname."&lname=".$lname."&phone=".$phone."&addres=".$addres."&city=".$city."&email=".$email);
		exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL) and !preg_match("/^[a-zA-Z]*$/",$fname) and !preg_match("/^[a-zA-Z]*$/",$lname) and is_numeric($phone)){
		header("Location: ../upload.php?error=invalid4");
		exit();
	}else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
		header("Location: ../upload.php?error=invalidmail&fname=".$fname."&lname=".$lname."&phone=".$phone."&addres=".$addres."&city=".$city);
		exit();
	}else if(!preg_match("/^[a-zA-Z]*$/",$fname)){
		header("Location: ../upload.php?error=invalidfname&lname=".$lname."&phone=".$phone."&addres=".$addres."&city=".$city."&email=".$email);
		exit();
	}else if(!preg_match("/^[a-zA-Z]*$/",$lname)){
		header("Location: ../upload.php?error=invalidlname&fname=".$fname."&phone=".$phone."&addres=".$addres."&city=".$city."&email=".$email);
		exit();
	}else{
		$sql="SELECT phone FROM phonebook WHERE phone=?";
		$stmt=mysqli_stmt_init($conn);
		if(!mysqli_stmt_prepare($stmt, $sql)){
			header("Location: ../upload.php?error=sqlerror");
			exit();
		}else{
			mysqli_stmt_bind_param($stmt, "s", $phone);
			mysqli_stmt_execute($stmt);
			mysqli_stmt_store_result($stmt);
			$resultCheck = mysqli_stmt_num_rows($stmt);
			if($resultCheck > 0 || !preg_match('/^\d{10}$/', $phone)){
				header("Location: ../upload.php?error=phoneis&fname=".$fname."&lname=".$lname."&phone=".$phone."&addres=".$addres."&city=".$city."&email=".$email);
				exit();
			}else{
				$sql="SELECT email FROM phonebook WHERE email=?";
				$stmt=mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../upload.php?error=sqlerror");
					exit();
				}else{
				mysqli_stmt_bind_param($stmt, "s", $email);
				mysqli_stmt_execute($stmt);
				mysqli_stmt_store_result($stmt);
				$resultCheck = mysqli_stmt_num_rows($stmt);
				if($resultCheck > 0){
					header("Location: ../upload.php?error=emailis&fname=".$fname."&lname=".$lname."&phone=".$phone."&addres=".$addres."&city=".$city."&email=".$email);
					exit();
			}else{
				$sql="INSERT INTO `phonebook` (`fname`, `lname`, `phone`, `addres`, `city`, `email`) VALUES (?,?,?,?,?,?)";
				$stmt=mysqli_stmt_init($conn);
				if(!mysqli_stmt_prepare($stmt, $sql)){
					header("Location: ../upload.php?error=sqlerror");
					exit();
				}else{
					mysqli_stmt_bind_param($stmt, "ssssss", $fname, $lname, $phone, $addres, $city, $email);
					mysqli_stmt_execute($stmt);
					header("Location: ../upload.php?upload=success");
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
	header("Location: ../upload.php");
	exit();
}
