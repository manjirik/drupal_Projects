<?php 
session_start();
include("inc/config.php");
include_once("controller/tblUserController.php");
if(isset($_SESSION["user_id"]) || $_SESSION["user_id"] > 0)
{
	header("location: ".ROOT_URL);
}
$paramArray = array
(	
	"dmm_company_name" => $_POST["txtUserName"],
	"password" => md5($_POST["txtPassword"])	
);
$dbObj = new database();
$conObj = $dbObj->connectDB();
$userObj = new tblUserController($conObj);
$userArr = $userObj->validateLogin($paramArray);

if(count($userArr)<=0)
{	
	//invalid user, go back...
	$_SESSION["errMsg"] = "Invalid User";
	//header("location: index.php");
	echo "Invalid User";
}
else
{
	//valid user, go ahead
	unset($_SESSION["errMsg"]);
	$_SESSION["user_id"] = $userArr[0]["id"];
	//$_SESSION["admin_name"] = trim($adminArr[0]["admin_first_name"]) . " " . trim($adminArr[0]["admin_last_name"]);
	$_SESSION["user_name"] = trim($userArr[0]["dmm_company_name"]);
	//header("location: index.php");
	echo $_SESSION["user_name"];
}
?>