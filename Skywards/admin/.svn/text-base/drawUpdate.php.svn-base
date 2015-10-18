<?php echo "hi";

	include("inc/config.php");
	include("inc/chkSession.php");
	include_once("controller/tblDrawController.php");
	$tblpageObj = new tblDrawController();
	$tmp_page = "";
	if(isset($_REQUEST['hPageNum']) && $_REQUEST['hPageNum']!="")
	{
		$tmp_page = "?page=".$_REQUEST['hPageNum'];
	}
	echo $goToList = "drawDetailList.php".$tmp_page;
	$tblpageObj->updateDrawRecord();
	header("location: $goToList"); die;	
?>