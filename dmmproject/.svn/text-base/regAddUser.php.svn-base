<?php 
session_start();
include("inc/config.php");
include("inc/mailer.php");
include_once("controller/tblUserController.php");
include_once("controller/tblBillboardController.php");

$paramArray = array
(	
	"table_name" => "user",
	"name" => $_POST["reg_name"],
	"dmm_company_name" => $_POST["reg_dmm_comp_name"],
	"email" => $_POST["reg_email"],
	"password" => md5($_POST["reg_password"]),
	"musician_info" => $_POST["reg_tell_us"],
	"country" => $_POST["reg_country"],
	"date_of_birth" => $_POST["reg_dob_year"]."-".$_POST["reg_dob_month"]."-".$_POST["reg_dob_day"],
	"strengths" => $_POST["reg_strength"],
	"twitter" => $_POST["reg_twitter"],
	"facebook" => $_POST["reg_facebook"],
	"paid" => 1,
	"status" => 1,
	"notify" => $_POST["reg_notify_me"],
);
$dbObj = new database();
$conObj = $dbObj->connectDB();
$userObj = new tblUserController($conObj);
$billboardObj = new tblBillboardController($conObj);
$userId = $userObj->userRegistration($paramArray);
if($userId > 0)
{	
	//valid user, go ahead
	unset($_SESSION["errMsg"]);
	$_SESSION["user_id"] = $userId;
	$_SESSION["user_name"] = trim($_POST["reg_name"]);
	
	$upload_user_path = ADMIN_UPLOAD_PATH."user_".$userId;
	$upload_user_avatar_path = ADMIN_UPLOAD_PATH."user_".$userId."/avatar";
	$upload_billboard_path = ADMIN_UPLOAD_PATH."user_".$userId."/billboard";
	$upload_user_billboard_zip_path = ADMIN_UPLOAD_PATH."user_".$userId."/billboard_zip";
	$upload_user_billboard_path = ADMIN_UPLOAD_PATH."user_".$userId."/user_billboard";
	$upload_songs_billboard_path = ADMIN_UPLOAD_PATH."user_".$userId."/songs_billboard";
	$upload_user_songs_path = ADMIN_UPLOAD_PATH."user_".$userId."/user_songs";
	$upload_user_addvs_path = ADMIN_UPLOAD_PATH."user_".$userId."/user_advertise";
	
	mkdir($upload_user_path, 0777);
	mkdir($upload_user_avatar_path, 0777);
	mkdir($upload_billboard_path, 0777);
	mkdir($upload_user_billboard_zip_path, 0777);
	mkdir($upload_user_billboard_path, 0777);
	mkdir($upload_songs_billboard_path, 0777);
	mkdir($upload_user_songs_path, 0777);
	mkdir($upload_user_addvs_path, 0777);
	
	if($_POST['reg_avatar_path'] != "")
	{
		$arr_avatar = explode("/",$_POST['reg_avatar_path']);
		if (copy($_POST['reg_avatar_path'], $upload_user_avatar_path."/".$arr_avatar[count($arr_avatar)-1])) {
			unlink($_POST['reg_avatar_path']);
			$paramArray1 = array
			(	
				"table_name" => "user",
				"avatar" => $arr_avatar[count($arr_avatar)-1],
				"user_id" => $userId,
			);
			$user_avatar_update = $userObj->userRegistrationAvatarUpdate($paramArray1);
		}
	}
	if($_POST['reg_billboard_path'] != "")
	{
		$arr_billboard = explode("/",$_POST['reg_billboard_path']);
		if (copy($_POST['reg_billboard_path'], $upload_billboard_path."/".$arr_billboard[count($arr_billboard)-1])) {
			unlink($_POST['reg_billboard_path']);
			$paramArray1 = array
			(	
				"table_name" => "billboard",
				"file_path" => $arr_billboard[count($arr_billboard)-1],
				"user_id" => $userId,
			);
			$user_billboard_insert = $billboardObj->billboardInsert($paramArray1);
		}
	}
	if($_POST['reg_billboard_zip_path'] != "")
	{
		$arr_billboard_zip = explode("/",$_POST['reg_billboard_zip_path']);
		if (copy($_POST['reg_billboard_zip_path'], $upload_user_billboard_zip_path."/".$arr_billboard_zip[count($arr_billboard_zip)-1])) {
			unlink($_POST['reg_billboard_zip_path']);
			$paramArray1 = array
			(	
				"table_name" => "billboard",
				"file_path" => $arr_billboard_zip[count($arr_billboard_zip)-1],
				"file_type" => 1,
				"user_id" => $userId,
			);
			$user_billboard_insert = $billboardObj->billboardInsert($paramArray1);
		}
	}
	mailForUserRegistration($_POST["reg_email"],$_POST["reg_name"],$_POST["reg_dmm_comp_name"],$_POST["reg_password"]);
	mailToAdminForUserRegistration($adminEmail,$_POST["reg_name"],$_POST["reg_dmm_comp_name"],$_POST["reg_password"]);
	echo $_POST["reg_dmm_comp_name"];
}
else
{
	//invalid user, go back...
	$_SESSION["errMsg"] = "registration not done";
	echo "registration not done";
}
?>