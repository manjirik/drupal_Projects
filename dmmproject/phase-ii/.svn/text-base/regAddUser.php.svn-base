<?php 

session_start();

include_once "inc/config.php";
include_once "inc/mailer.php";
include_once "controller/tblUserController.php";
include_once "controller/tblBillboardController.php";
include_once 'inc/SimpleImage.php';

if($_POST["user_type"] == "listener"){
$paramArray = array(
	"table_name" => "user",
	"name" => $_POST["list_reg_full_name"],
	"dmm_company_name" => $_POST["list_reg_user_name"],
	"date_of_birth" => $_POST["list_reg_dob_year"] . "-" . $_POST["list_reg_dob_month"] . "-" . $_POST["list_reg_dob_day"],
	"email" => $_POST["list_reg_email"],
	"password" => md5($_POST["list_reg_password"]),
	"gender" => $_POST["list_reg_gender"],
	"country" => $_POST["list_reg_country"],
	"user_type" => $_POST["user_type"],
	
	"musician_info" => $_POST["reg_tell_us"],
	"strengths" => $_POST["reg_strength"],
	"twitter" => $_POST["reg_twitter"],
	"facebook" => $_POST["reg_facebook"],
	"notify" => $_POST["reg_notify_me"],
	"create_date" => date("Y-m-d H:i:s"),
	"paid" => 0,
	"status" => 1,
	
);
}elseif($_POST["user_type"] == "musician"){
$paramArray = array(
	"table_name" => "user",
	"name" => $_POST["reg_name"],
	"dmm_company_name" => $_POST["reg_dmm_comp_name"],
	"email" => $_POST["reg_email"],
	"password" => md5($_POST["reg_password"]),
	"musician_info" => $_POST["reg_tell_us"],
	"country" => $_POST["reg_country"],
	"date_of_birth" => $_POST["reg_dob_year"] . "-" . $_POST["reg_dob_month"] . "-" . $_POST["reg_dob_day"],
	"musician_type" => $_POST["reg_musician_type"],
	"years_making_music" => $_POST["reg_years_making_music"],
	"twitter" => $_POST["reg_twitter"],
	"facebook" => $_POST["reg_facebook"],
	"personal_website" => $_POST["reg_personal_website"],
	"paid" => 1,
	"status" => 1,
	"user_type" => $_POST["user_type"],
	"create_date" => date("Y-m-d H:i:s"),
	"gender" => $_POST["reg_gender"],
	"notify_message" => 1
);
}

$dbObj = new database();
$conObj = $dbObj->connectDB();

$userObj = new tblUserController($conObj);
$userId = $userObj->userRegistration($paramArray);

$billboardObj = new tblBillboardController($conObj);

if($userId > 0) {	
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
	$upload_songs_billboard_preview_path = ADMIN_UPLOAD_PATH."user_".$userId."/songs_billboard/preview";
	$upload_user_songs_path = ADMIN_UPLOAD_PATH."user_".$userId."/user_songs";
	$upload_user_addvs_path = ADMIN_UPLOAD_PATH."user_".$userId."/user_advertise";
	$upload_user_zone_path = ADMIN_UPLOAD_PATH."user_".$userId."/user_zone";
	
	mkdir($upload_user_path, 0777);
	mkdir($upload_user_avatar_path, 0777);
	mkdir($upload_billboard_path, 0777);
	mkdir($upload_user_billboard_zip_path, 0777);
	mkdir($upload_user_billboard_path, 0777);
	mkdir($upload_songs_billboard_path, 0777);
	mkdir($upload_songs_billboard_preview_path, 0777);
	mkdir($upload_user_songs_path, 0777);
	mkdir($upload_user_addvs_path, 0777);
	mkdir($upload_user_zone_path, 0777);
	
	if($_POST['reg_avatar_path'] != "") {
		$arr_avatar = explode("/", $_POST['reg_avatar_path']);
		$tmp_path = $_POST['reg_avatar_path'];
		$path = $upload_user_avatar_path."/".$arr_avatar[count($arr_avatar)-1];
		$image = new SimpleImage();
		$image->load($tmp_path);
		$image->resize(64,64);
		//$image->save($path);
		/*if (copy($_POST['reg_avatar_path'], $upload_user_avatar_path."/".$arr_avatar[count($arr_avatar)-1])) {*/
		if ($image->save($path)){
			@unlink($tmp_path);
			$paramArray1 = array(
				"table_name" => "user",
				"avatar" => $arr_avatar[count($arr_avatar)-1],
				"user_id" => $userId,
			);
			$user_avatar_update = $userObj->userRegistrationAvatarUpdate($paramArray1);
		}
	}
	
	if($_POST['reg_zone_path'] != "") {
		$arr_zone = explode("/", $_POST['reg_zone_path']);
		
		$tmp_zone_path = $_POST['reg_zone_path'];
		$path1 = $upload_user_zone_path."/".$arr_zone[count($arr_zone)-1];
		$image1 = new SimpleImage();
		$image1->load($tmp_zone_path);
		
		list($width, $height) = getimagesize($tmp_zone_path);

		if($width > 1200 && $height > 700 && $width >= $height) {
			$image1->resizeToWidth(1200);
		}elseif($width > 1200 && $height > 700 && $width <= $height) {
			$image1->resizeToHeight(700);
		}elseif($width > 1200 && $height <= 700) {
			$image1->resizeToWidth(1200);
		}elseif($width <= 1200 && $height > 700) {
			$image1->resizeToHeight(700);
		}

		//if (copy($_POST['reg_zone_path'], $upload_user_zone_path."/".$arr_zone[count($arr_zone)-1])) {
		if ($image1->save($path1)){
			@unlink($tmp_zone_path);
			$paramArray1 = array(
				"table_name" => "user",
				"zone" => $arr_zone[count($arr_zone)-1],
				"user_id" => $userId,
			);
			$user_zone_update = $userObj->userZoneUpdate($paramArray1);
		}
	}
	
	if($_POST['reg_billboard_path'] != "") {
		$arr_billboard = explode("/", $_POST['reg_billboard_path']);
		if (copy($_POST['reg_billboard_path'], $upload_billboard_path."/".$arr_billboard[count($arr_billboard)-1])) {
			@unlink($_POST['reg_billboard_path']);
			$paramArray1 = array(
				"table_name" => "billboard",
				"file_path" => $arr_billboard[count($arr_billboard)-1],
				"user_id" => $userId,
			);
			$user_billboard_insert = $billboardObj->billboardInsert($paramArray1);
		}
	}
	
	if($_POST['reg_billboard_zip_path'] != "") {
		$arr_billboard_zip = explode("/", $_POST['reg_billboard_zip_path']);
		if (copy($_POST['reg_billboard_zip_path'], $upload_user_billboard_zip_path."/".$arr_billboard_zip[count($arr_billboard_zip)-1])) {
			unlink($_POST['reg_billboard_zip_path']);
			$paramArray1 = array(
				"table_name" => "billboard",
				"file_path" => $arr_billboard_zip[count($arr_billboard_zip)-1],
				"file_type" => 1,
				"user_id" => $userId,
			);
			$user_billboard_insert = $billboardObj->billboardInsert($paramArray1);
		}
	}
//	mailForUserRegistration($_POST["reg_email"], $_POST["reg_name"], $_POST["reg_dmm_comp_name"], $_POST["reg_password"]);
	//mailToAdminForUserRegistration($adminEmail, $_POST["reg_name"], $_POST["reg_dmm_comp_name"], $_POST["reg_password"]);

	echo $paramArray["dmm_company_name"];
	
} else {
	//invalid user, go back...
	$_SESSION["errMsg"] = "registration not done";
	echo 0;
}

?>