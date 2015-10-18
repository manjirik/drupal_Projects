<?php
include_once "inc/config.php";
include_once "controller/tblAdminController.php";
$paramArray = array
(	
	"admUsername" => $_POST["txtUserName"],
	"admPassword" => $_POST["txtPassword"]	
);
$adminObj = new tblAdminController();
$adminArr = $adminObj->validateAdminLogin($paramArray);
if(count($adminArr)<=0)
{	
	//invalid user, go back...
	$_SESSION["errMsg"] = "Invalid User";
	header("location: index.php");
}
else
{
	//valid user, go ahead
	$_SESSION["admin_id"] = $adminArr[0]["admin_id"];
	//$_SESSION["admin_name"] = trim($adminArr[0]["admin_first_name"]) . " " . trim($adminArr[0]["admin_last_name"]);
	$_SESSION["admin_name"] = trim($adminArr[0]["admin_username"]);
	header("location: home.php");
}?>