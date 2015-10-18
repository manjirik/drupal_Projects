<?php 
	//include("inc/config.php");
	include_once("controller/tblCityController.php");
	$tblpageObj = new tblCityController();

	$FooterDetails = $tblpageObj->getDetailsById($_POST['Id'], $_POST['tableName']);
	$FooterStatus = $FooterDetails[0]['status'];
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