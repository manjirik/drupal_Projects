<?php 

session_start();
include_once "inc/config.php"; 
include_once "inc/database.php";
include_once "controller/tblCommentController.php";
include_once "inc/mailer.php";

$songId = trim($_POST["songId"]);
$comment = trim($_POST["comment"]);
$top = COMMENT_LIST_COUNT;

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblCommentObj = new tblCommentController($conObj);	
$msg=trim($_POST["comment"]);
//saving a new comment
$paramArray = array (
	"table_name" => "comments",							
	"song_id" => $songId,
	"user_id" => $_SESSION['user_id'],
	"comment" => $comment,
	"status" => 0,
	"create_date" => date('Y-m-d H:i:s')
);
$retVal = $tblCommentObj->saveNew($paramArray);

$songmusicianInfoArr = $tblCommentObj->getMusicianInfo($paramArray);

$songmusicianInfoArrCnt = count($songmusicianInfoArr);

	if($songmusicianInfoArrCnt > 0) {
		
		mailForCommentMusician($songmusicianInfoArr[0]['musician_email'], $msg, $songmusicianInfoArr[0]['musician_name'],$_SESSION['user_details']['dmm_company_name'], $songmusicianInfoArr[0]['song_name'], $songId);
	
		echo json_encode(array(
			'status' => $songmusicianInfoArr[0]['Status'], 
			'song_name' =>$songmusicianInfoArr[0]['song_name'], 
			'musician_name' =>$songmusicianInfoArr[0]['musician_name'], 
			'user_name' => $songmusicianInfoArr[0]['User_Name'])
		);
}

?>