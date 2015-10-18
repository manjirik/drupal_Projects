<?php 
session_start();
include("inc/config.php");
include("inc/mailer.php");
include_once("controller/tblUserController.php");
include_once("controller/tblBillboardController.php");

$paramArray = array
(	
	"table_name" => "user",
	"user_id" => $_SESSION["user_id"],
	"name" => $_POST["edit_dmm_name"],
	"email" => $_POST["edit_dmm_email"],
	"musician_info" => $_POST["edit_dmm_musician_info"],
	"strengths" => $_POST["edit_dmm_strengths"],
	"twitter" => $_POST["edit_dmm_twitter"],
	"facebook" => $_POST["edit_dmm_facebook"],
);
if($_POST["edit_dmm_password"] != '')
{
	$paramArray['password'] = md5($_POST["edit_dmm_password"]);
}

$dbObj = new database();
$conObj = $dbObj->connectDB();
$userObj = new tblUserController($conObj);
$billboardObj = new tblBillboardController($conObj);
$userId = $userObj->userProfileUpdate($paramArray);
if($userId > 0)
{	
	//valid user, go ahead
	
	$upload_user_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"];
	$upload_user_avatar_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/avatar";
	$upload_billboard_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/billboard";
	$upload_user_billboard_zip_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/billboard_zip";
	$upload_user_billboard_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/user_billboard";
	$upload_songs_billboard_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/songs_billboard";
	$upload_user_songs_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/user_songs";
	$upload_user_addvs_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/user_advertise";
	
	
	if($_POST['edit_dmm_avtarImage_path'] != "")
	{
		$arr_avatar = explode("/",$_POST['edit_dmm_avtarImage_path']);
		if (copy($_POST['edit_dmm_avtarImage_path'], $upload_user_avatar_path."/".$arr_avatar[count($arr_avatar)-1])) {
			unlink($_POST['edit_dmm_avtarImage_path']);
			$paramArray1 = array
			(	
				"table_name" => "user",
				"avatar" => $arr_avatar[count($arr_avatar)-1],
				"user_id" => $_SESSION["user_id"],
			);
			$user_avatar_update = $userObj->userRegistrationAvatarUpdate($paramArray1);
		}
	}
	if($_POST['edit_dmm_billBordImage_path'] != "")
	{
		$arr_billboard = explode("/",$_POST['edit_dmm_billBordImage_path']);
		$arr_billBoard_name = $arr_billboard[count($arr_billboard)-1];
		$arr_ext_arr = explode(".",$arr_billBoard_name);
		if(strtolower($arr_ext_arr[count($arr_ext_arr)-1] )== 'zip')
		{
			if (copy($_POST['edit_dmm_billBordImage_path'], $upload_user_billboard_zip_path."/".$arr_billBoard_name)) 
			{
				unlink($_POST['edit_dmm_billBordImage_path']);
				$paramArray1 = array
				(	
					"table_name" => "billboard",
					"file_path" => $arr_billBoard_name,
					"file_type" => 1,
					"user_id" => $_SESSION["user_id"],
					"create_date" => date("Y-m-d H:i:s")
				);
				$user_billboard_insert = $billboardObj->billboardInsert($paramArray1);
			}
		}
		else
		{
			if (copy($_POST['edit_dmm_billBordImage_path'], $upload_billboard_path."/".$arr_billBoard_name)) 
			{
				unlink($_POST['edit_dmm_billBordImage_path']);
				$paramArray1 = array
				(	
					"table_name" => "billboard",
					"file_path" => $arr_billBoard_name,
					"user_id" => $_SESSION["user_id"],
					"create_date" => date("Y-m-d H:i:s")
				);
				$user_billboard_insert = $billboardObj->billboardInsert($paramArray1);
			}
		}
		mailForEditBillbord($adminEmail, $_SESSION["user_name"]);
	}
	echo "changes save successfuly";
}
else
{
	//invalid user, go back...
	echo "changes not save";
}
?>