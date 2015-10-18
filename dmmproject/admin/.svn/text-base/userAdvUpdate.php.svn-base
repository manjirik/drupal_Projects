<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblUserAdvertiseController.php";
	$tblpageObj = new tblUserAdvertiseController();
	if($_REQUEST['hPageNum']!="")
	{
		$tmp_page = "&page=".$_REQUEST['hPageNum'];
	}
	$user_id = $_REQUEST['user_id'];
	$goToList = "userAdvList.php?id=".$user_id.$tmp_page;

	$tblpageObj->updateAdvRecord();
	header("location: $goToList"); die;	
?>