<?php 
	include("inc/config.php");
	include("inc/chkSession.php");
	include_once("controller/tblAdminController.php");
	$tblpageObj = new tblAdminController();
	$tmp_page = "";
	if(isset($_REQUEST['hPageNum']) && $_REQUEST['hPageNum']!="")
	{
		$tmp_page = "?page=".$_REQUEST['hPageNum'];
	}
	echo $goToList = "adminUsersList.php".$tmp_page;
	$tblpageObj->updateAdminRecord();
	header("location: $goToList"); die;	
?>