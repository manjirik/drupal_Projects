<?php session_start();
	if(trim($_SESSION["empId"])=="" && trim($_SESSION["empCode"])=="" && trim($_SESSION["empEmail"])=="")
	{
		header('Location: index.php');
	}
?>