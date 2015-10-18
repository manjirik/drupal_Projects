<?php 
	include("inc/config.php");
	include("inc/chkSession.php");
	include_once("controller/tblNotificationController.php");
	$tblpageObj = new tblNotificationController();
	$tmp_page = "";
	if(isset($_REQUEST['hPageNum']) && $_REQUEST['hPageNum']!="")
	{
		$tmp_page = "?page=".$_REQUEST['hPageNum'];
	}
	echo $goToList = "notificationMessageList.php".$tmp_page;
	$tblpageObj->updateNotificationRecord();
	header("location: $goToList"); die;	
?>