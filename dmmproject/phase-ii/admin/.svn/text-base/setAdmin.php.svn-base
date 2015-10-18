<?php 
	include_once "inc/config.php"; 
	include_once "inc/chkSession.php";
	include_once "controller/tblAdminController.php";
	$txtpageObj = new tblAdminController();
	$setAdminId = $_POST["setAdminId"];
	$status = $_POST["checkedValue"];

	if($status == 'true')
				{
				$qry = "update admin set admin_log_status = '1' where admin_id='".$setAdminId."'";					
				$result = mysql_query($qry);
				echo "Record Publish.";
				}elseif($status == 'false'){
				$qry = "update admin set admin_log_status = '0' where admin_id='".$setAdminId."'";					
				$result = mysql_query($qry);
				echo "Record Unpublish.";
				}	
?>	