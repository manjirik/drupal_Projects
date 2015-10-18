<?php 
	//include("inc/config.php");
	include_once("controller/tblUserEntryController.php");
	$tblpageObj = new tblUserEntryController();
	$table =  $tblpageObj->tablename;
	$EntryDetails = $tblpageObj->getDetailsById($_POST['Id'], $table);
	$is_featured = $EntryDetails[0][$tblpageObj->is_featured];
	if($is_featured == 1)
	{
		$st = 0;
	}
	else
	{
		$st = 1;
	}
	echo $st;
	$tblpageObj->updateFeaturedStatus($_POST['Id'], $st, $table); die;
	
?>