<?php
	if(trim($_SESSION["user_id"])=="" && trim($_SESSION["user_name"])=="")
	{
		$_SESSION["errMsg"] = "Session time-out.";
		header('Location: index.php');
	}
?>