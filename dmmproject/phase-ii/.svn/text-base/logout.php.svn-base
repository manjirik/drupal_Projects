<?php 
	include("inc/config.php");
	$_SESSION["user_id"] = ""; 
	$_SESSION["user_name"] = "";
	unset($_SESSION["user_id"]); 
	unset($_SESSION["user_name"]);
	
	setcookie("DMMID", "", time() - 3600, '/');
	setcookie("DMMKEY", "", time() - 3600, '/');
	
	unset($_COOKIE['DMMID']);
	unset($_COOKIE['DMMKEY']);
	
	setcookie("LISTENERLIFESTYLEDISPLAY", "", time(), '/');
	
	header("location: ". HOST_URL);
?>