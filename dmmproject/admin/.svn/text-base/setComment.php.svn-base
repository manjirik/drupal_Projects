<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblCommentController.php";
	$txtpageObj = new tblCommentController();
	$setCommentId = $_POST["setCommentId"];
	$status = $_POST["checkedValue"];

	if($status == 'true')
				{
				//$txtpageObj->changeStatus($status,$setCommentId);
				$qry = "update comments set status = '1' where id='".$setCommentId."'";					
				$result = mysql_query($qry);
				echo "Record Publish.";
				}elseif($status == 'false'){
				//$txtpageObj->changeStatus($status,$setCommentId);
				$qry = "update comments set status = '0' where id='".$setCommentId."'";					
				$result = mysql_query($qry);
				echo "Record Unpublish.";
				}	
?>	