<?php

session_start();

include_once 'inc/config.php';
include_once 'inc/mailer.php';
include_once 'controller/tblUserController.php';
include_once 'controller/tblBillboardController.php';
include_once 'inc/SimpleImage.php';

$paramArray = array (
	"table_name" => "user",
	"user_id" => $_SESSION["user_id"],
	"email" => $_POST["edit_dmm_email"],
	"twitter" => $_POST["edit_dmm_twitter"],
	"facebook" => $_POST["edit_dmm_facebook"],
	"personal_website" => $_POST["edit_personal_website"],
	"musician_type" => $_POST["musician_type"],
	"years_making_music" => $_POST["lr_years_making_music"],
	"country" => $_POST["lr_country"],
	"musician_info" => $_POST["edit_dmm_musician_info"],
	"notify_message" => $_POST["notify_message"],
	/*"user_id" => $_SESSION["user_id"],
	"name" => $_POST["edit_dmm_name"],
	"strengths" => $_POST["edit_dmm_strengths"],
	"gender" => $_POST["edit_dmm_gender"],*/
);


/* Remove blank value array key */
$paramArray = array_filter($paramArray);

if($_POST["edit_dmm_password"] != '') {
	$paramArray['password'] = md5($_POST["edit_dmm_password"]);
}

$avtarImage_info = pathinfo($_POST['edit_dmm_avtarImage_path']);
$edit_dmm_zone_path = pathinfo($_POST['edit_dmm_zone_path']);
// $edit_dmm_billBordImage_path = pathinfo($_POST['edit_dmm_billBordImage_path']);
$filesArray = array(
	'avatar' => !empty($avtarImage_info['filename']) ? ($avtarImage_info['filename'] . '.' . $avtarImage_info['extension']) : '',
	'zone' => !empty($edit_dmm_zone_path['filename']) ? ($edit_dmm_zone_path['filename'] . '.' . $edit_dmm_zone_path['extension']) : ''
	// 'billboard_image' => $edit_dmm_billBordImage_path['filename']
);

$dbObj = new database();
$conObj = $dbObj->connectDB();

$userObj = new tblUserController($conObj);
$userId = $userObj->userProfileUpdate($paramArray, $filesArray);
$billboardObj = new tblBillboardController($conObj);

if(-999 == (int)$userId) {
	echo -999;
} else if($userId > 0) {
	//valid user, go ahead
	$upload_user_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"];
	$upload_user_avatar_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/avatar";
	$upload_billboard_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/billboard";
	$upload_user_billboard_zip_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/billboard_zip";
	$upload_user_billboard_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/user_billboard";
	$upload_songs_billboard_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/songs_billboard";
	$upload_user_songs_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/user_songs";
	$upload_user_addvs_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/user_advertise";
	$upload_user_zone_path = ADMIN_UPLOAD_PATH."user_".$_SESSION["user_id"]."/user_zone";
	
	
	if($_POST['edit_dmm_avtarImage_path'] != "") {
		$arr_avatar = explode("/", $_POST['edit_dmm_avtarImage_path']);
		
		$tmp_path = $_POST['edit_dmm_avtarImage_path'];
		$path = $upload_user_avatar_path . "/" . $arr_avatar[count($arr_avatar)-1];
		$image = new SimpleImage();
		$image->load($tmp_path);
		$image->resize(64,64);
		
		if ($image->save($path)) {
			unlink(DOCUMENT_ROOT.BASE_PATH . '/temp_upload/registration/avatar/' . $arr_avatar[count($arr_avatar)-1]);
			$paramArray1 = array(
				"table_name" => "user",
				"avatar" => $arr_avatar[count($arr_avatar)-1],
				"user_id" => $_SESSION["user_id"],
			);
			$user_avatar_update = $userObj->userRegistrationAvatarUpdate($paramArray1);
		}
	}

	if($_POST['edit_dmm_zone_path'] != "") {
		$arr_zone = explode("/",$_POST['edit_dmm_zone_path']);

		$tmp_zone_path = $_POST['edit_dmm_zone_path'];
		$path1 = $upload_user_zone_path."/".$arr_zone[count($arr_zone)-1];
		$image1 = new SimpleImage();
		$image1->load($tmp_zone_path);
		
		list($width, $height) = getimagesize($tmp_zone_path);

		if($width > 1200 && $height > 700 && $width >= $height) {
			$image1->resizeToWidth(1200);
		} elseif($width > 1200 && $height > 700 && $width <= $height) {
			$image1->resizeToHeight(700);
		} elseif($width > 1200 && $height <= 700) {
			$image1->resizeToWidth(1200);
		} elseif($width <= 1200 && $height > 700) {
			$image1->resizeToHeight(700);
		}

		if ($image1->save($path1)) {
			unlink(DOCUMENT_ROOT.BASE_PATH.'/temp_upload/registration/zone/'.$arr_zone[count($arr_zone)-1]);
			$paramArray1 = array(
				"table_name" => "user",
				"zone" => $arr_zone[count($arr_zone)-1],
				"user_id" => $_SESSION["user_id"],
			);
			$user_zone_update = $userObj->userZoneUpdate($paramArray1);
		}
	}


	if($_POST['edit_dmm_billBordImage_path'] != "") {
		$arr_billboard = explode("/",$_POST['edit_dmm_billBordImage_path']);
		$arr_billBoard_name = $arr_billboard[count($arr_billboard)-1];
		$arr_ext_arr = explode(".",$arr_billBoard_name);
		if(strtolower($arr_ext_arr[count($arr_ext_arr)-1] )== 'zip') {
			if (copy($_POST['edit_dmm_billBordImage_path'], $upload_user_billboard_zip_path."/".$arr_billBoard_name)) {
				unlink($_POST['edit_dmm_billBordImage_path']);
				$paramArray1 = array(
					"table_name" => "billboard",
					"file_path" => $arr_billBoard_name,
					"file_type" => 1,
					"user_id" => $_SESSION["user_id"],
					"create_date" => date("Y-m-d H:i:s")
				);
				$user_billboard_insert = $billboardObj->billboardInsert($paramArray1);
			}
		} else {
			if (copy($_POST['edit_dmm_billBordImage_path'], $upload_billboard_path."/".$arr_billBoard_name))  {
				unlink(DOCUMENT_ROOT.BASE_PATH.'/temp_upload/registration/billboard/'.$arr_billBoard_name);
				$paramArray1 = array (
					"table_name" => "billboard",
					"file_path" => $arr_billBoard_name,
					"user_id" => $_SESSION["user_id"],
					"create_date" => date("Y-m-d H:i:s")
				);
				$user_billboard_insert = $billboardObj->billboardInsert($paramArray1);
			}
		}
		//mailForEditBillbord($adminEmail, $_SESSION["user_name"]);
	}
	echo 1;
} else {
	//invalid user, go back...
	echo 0;
}
?>