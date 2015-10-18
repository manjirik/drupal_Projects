<?php 
session_start();

include_once "inc/config.php";
include_once "inc/database.php";
include_once "inc/mailer.php";
include_once "controller/tblUserController.php";

$top = COMMENT_LIST_COUNT;

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblUserObj = new tblUserController($conObj);	

$musicianInfoArr = $tblUserObj->getUserDetailsByDmmCompanyName(array('dmm_company_name' => trim($_POST["musician_name"])));
$musicianInfoArrCnt = count($musicianInfoArr);

if($musicianInfoArrCnt >0) {
	for($i=0; $i<$musicianInfoArrCnt; $i++){
		mailForMessageMusician($musicianInfoArr[$i]['email'], trim($_POST["msg"]), $musicianInfoArr[$i]['dmm_company_name'], $_SESSION['user_details']['dmm_company_name']);
	}
	
	echo json_encode(array(
		'status' => $musicianInfoArr[0]['status'], 
		'musician_name' =>$musicianInfoArr[0]['dmm_company_name'], 
		'user_name' => $musicianInfoArr[0]['name'])
	);
}

?>