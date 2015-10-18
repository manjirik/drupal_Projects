<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once"controller/tblAdminController.php";
	$tblpageObj = new tblAdminController();
	$goToList = "cmsPage.php?flag=update";
	
	$tblpageObj->updateCmsSettings();
	
	header("location: $goToList"); die;	
?>