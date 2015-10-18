<?php 
session_start();
include_once("inc/config.php"); 
include_once("inc/database.php");
include_once("controller/tblCommentController.php");

$songId = trim($_POST["songId"]);
$comment = trim($_POST["comment"]);
$top = COMMENT_LIST_COUNT;

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblCommentObj = new tblCommentController($conObj);	

//saving a new comment
$paramArray = array
(
	"table_name" => "comments",							
	"song_id" => $songId,
	"user_id" => $_SESSION['user_id'],
	"comment" => $comment,
	"status" => 0,
	"create_date" => date('Y-m-d H:i:s')
);
$retVal = $tblCommentObj->saveNew($paramArray);
if($retVal>0)
{		
	echo "insert successfully";
}
//$dbObj->closeConn($conObj); 
$dbObj = $tblCommentObj = null; ?>