<?php
session_start();
include_once "inc/config.php";
include_once "inc/mailer.php";
include_once "controller/tblUserController.php";
$paramArray = array
(	
	"table_name" => "user",
	"dmm_company_name" => $_POST["dmm_user_name"],
);
$dbObj = new database();
$conObj = $dbObj->connectDB();
$userObj = new tblUserController($conObj);
$userDetails = $userObj->getUserDetailsByDmmCompanyName($paramArray);
$pass_array = array("a","b","c","d","e","f","g","h","i","j","k","l","m","n","o","p","q","r","s","t","u","v","w","x","y","z","A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z","0","1","2","3","4","5","6","7","8","9","!","$","@");
$password = "";
for($i=0; $i<6; $i++)
{
	$rand = rand(0,64);
	$password .= $pass_array[$rand];
}

if(count($userDetails) > 0)
{
	if($userDetails[0]['email'] != '')
	{
		$email = $userDetails[0]['email'];
		$paramArray = array
		(	
			"table_name" => "user",
			"password" => md5($password),
			"user_id" => $userDetails[0]['id']
		);
		$changePass = $userObj->userPasswordUpdate($paramArray);
		if($changePass > 0)
		{
			mailForForgotPass($email, $_POST["dmm_user_name"], $password);
			echo "success";
		}
	}
}
else
{
	echo "invalid dmm company name";
}
?>