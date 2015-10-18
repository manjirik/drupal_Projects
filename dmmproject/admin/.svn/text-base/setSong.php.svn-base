<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblUserSongsController.php";
	$txtpageObj = new tblUserSongsController();
	$setSongId = $_POST["setSongId"];
	$status = $_POST["checkedValue"];

	if($status == 'true')
				{
				$qry = "update songs set status = '1' where id='".$setSongId."'";					
				$result = mysql_query($qry);
				echo "Record Publish.";
				}elseif($status == 'false'){
				$qry = "update songs set status = '0' where id='".$setSongId."'";					
				$result = mysql_query($qry);
				echo "Record Unpublish.";
				}	
?>	