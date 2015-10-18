<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblCommentController.php";
	$tblpageObj = new tblCommentController();
	if($_REQUEST['hPageNum']!="")
	{
		$tmp_page = "?page=".$_REQUEST['hPageNum'];
	}
	$goToList = "commentList.php".$tmp_page;
	$tblpageObj->updateCommentRecord();
	header("location: $goToList"); die;	
?>