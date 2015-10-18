<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblSetAdvertiseOrderController.php";
	$tblpageObj = new tblSetAdvertiseOrderController();
	$goToList = "setAdvOrder.php?flag=update";
	
	$tblpageObj->updateSetOrder();
	
	header("location: $goToList"); die;	
?>