<?php include("inc/config.php");
include_once("controller/tblAdminController.php");
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
	$_SESSION["errMsg"] = "Invalid username or password";
	header("location: index.php");
}
else
{
	//valid user, go ahead
	$_SESSION["admin_id"] = $adminArr[0]["id"];
	$_SESSION["login_group_id"] = $adminArr[0]["tb_group_id"];
	$_SESSION["admin_name"] = trim($adminArr[0]["username"]);
	header("location: adminUsersList.php");
}?>