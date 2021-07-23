<?php
session_start();
if(isset($_SESSION['userUid'])=='admin'){
if(isset($_GET['id'])){
	require 'dbh.php';
	
	$id=$_GET['id'];
	$delete="DELETE FROM users WHERE idUsers=$id";
	if($id!=1){
	if(mysqli_query($conn,$delete))
		header("Location: ../userdelete.php?delete=success");
	else
		header("Location: ../userdelete.php?delete=failed");
	}else header("Location: ../userdelete.php?delete=admin");
}else{
	header("Location: ../userdelete.php");
	exit();
}
}
else{
	header("Location: ../index.php");
	exit();
		}
