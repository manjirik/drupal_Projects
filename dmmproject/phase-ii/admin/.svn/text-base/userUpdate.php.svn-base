<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblUserController.php";
	$tblpageObj = new tblUserController();
	if($_REQUEST['hPageNum']!="")
	{
		$tmp_page = "?page=".$_REQUEST['hPageNum'];
	}
	$goToList = "userList.php".$tmp_page;
	$tblpageObj->updateUserRecord();
	header("location: $goToList"); die;	
?>