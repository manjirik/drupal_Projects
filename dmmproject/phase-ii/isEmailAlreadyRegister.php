<?php 

session_start();

include_once "inc/config.php";
include_once "controller/tblUserController.php";

$dbObj = new database();
$conObj = $dbObj->connectDB();

$userObj = new tblUserController($conObj);
$userInfo = $userObj->checkuserByEmail(array('email' => $_REQUEST['email']));

if(empty($userInfo)) {
	echo 0;
} else {
	echo 1;
}