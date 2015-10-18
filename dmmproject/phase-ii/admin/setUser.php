<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblUserController.php";
	$txtpageObj = new tblUserController();
	$setUserId = $_POST["setUserId"];
	$status = $_POST["checkedValue"];

	if($status == 'true')
				{
				$qry = "update user set status = '1' where id='".$setUserId."'";					
				$result = mysql_query($qry);
				echo "Record Publish.";
				}elseif($status == 'false'){
				$qry = "update user set status = '0' where id='".$setUserId."'";					
				$result = mysql_query($qry);
				echo "Record Unpublish.";
				}	
?>	