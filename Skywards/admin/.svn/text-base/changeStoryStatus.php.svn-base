<?php 
	//include("inc/config.php");
	include_once("controller/tblUserEntryController.php");
	$tblpageObj = new tblUserEntryController();
	$table =  $tblpageObj->tablename;
	$EntryDetails = $tblpageObj->getDetailsById($_POST['Id'], $table);
	$EntryStatus = $EntryDetails[0][$tblpageObj->entry_status];
	if($EntryStatus == 1)
	{
		$st = 0;
	}
	else
	{
		$st = 1;
	}
	echo $st;
	$tblpageObj->updateStatus($_POST['Id'], $st, $table); die;
	
?>