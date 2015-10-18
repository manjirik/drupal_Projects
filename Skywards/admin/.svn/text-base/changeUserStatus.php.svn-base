<?php 
	//include("inc/config.php");
	include_once("controller/tblUserController.php");
	$tblpageObj = new tblUserController();

	$FooterDetails = $tblpageObj->getDetailsById($_POST['Id'], $_POST['tableName']);
	$FooterStatus = $FooterDetails[0]['is_active'];
	if($FooterStatus == 1)
	{
		$changeStatus = 0;
	}
	else
	{
		$changeStatus = 1;
	}
	print $changeStatus;
	$tblpageObj->updateStatus($_POST['Id'], $changeStatus, $_POST['tableName']);
	
?>