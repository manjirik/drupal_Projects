<?php 

	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblAdminController.php";
	$tblpageObj = new tblAdminController();
	if($_REQUEST['hPageNum']!="")
	{
		$tmp_page = "?page=".$_REQUEST['hPageNum'];
	}
	$goToList = "adminUserList.php".$tmp_page;
	$tblpageObj->updateAdminRecord();
	header("location: $goToList"); die;	
?>