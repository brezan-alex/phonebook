<?php
session_start();
if(isset($_SESSION['userUid'])=='admin'){
if(isset($_GET['phone']) and isset($_GET['fn'])){
	require 'dbh.php';
	
	$phone=$_GET['phone'];
	$fn=$_GET['fn'];
	$delete="DELETE FROM phonebook WHERE phone=$phone";
	if(mysqli_query($conn,$delete))
		header("Location: ../phonebook.php?delete=success&fn=$fn");
	else
		header("Location: ../phonebook.php?delete=failed");
}else{
	header("Location: ../phonebook.php");
	exit();
}
}
else{
	header("Location: ../phonebook.php?youarenot=admin");
	exit();
		}
