<?php 
session_start();

include_once "inc/config.php";
include_once "inc/database.php";
include_once "inc/mailer.php";
include_once "controller/tblCommentController.php";

$songId = trim($_POST["songId"]);
$comment = trim($_POST["comment"]);
$top = COMMENT_LIST_COUNT;

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblCommentObj = new tblCommentController($conObj);	

		$musicianInfoArr = $tblCommentObj->getMusicianInfo(array("songid"=>htmlentities($_POST["songId"], ENT_QUOTES)));
		$musicianInfoArrCnt = count($musicianInfoArr);

		if($musicianInfoArrCnt >0) {
		
	for($i=0; $i<$musicianInfoArrCnt; $i++)
		{		
		mailForMessageMusician($musicianInfoArr[$i]['musician_email'],$comment,$musicianInfoArr[$i]['musician_name'],$_SESSION['user_name']);
		}
		echo "sent successfully";
		}

$dbObj = $tblCommentObj = null; ?>