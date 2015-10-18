<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblAdminController.php";
	$tblpageObj = new tblAdminController();
	$goToList = "default_settings.php?flag=update";
	
	$tblpageObj->updateDefaultSettings();
	
	header("location: $goToList"); die;	
?>