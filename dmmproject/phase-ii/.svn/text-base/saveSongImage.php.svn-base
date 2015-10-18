<?php

session_start();

include_once 'inc/config.php';
include_once 'inc/database.php';
include_once 'inc/SimpleImage.php';
include_once 'controller/tblSongsController.php';

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblSongObj = new tblSongsController($conObj);	


if(1 == $_POST["remove_image"]) {
	$params = array(
		'id' => $_POST["id"],
		'billboard_image' => ''
	);
	
	echo $tblSongObj->updateSongImage($params);
} else {
	$tmp_zone_path = $_POST["billboard_image"];
	$basename = basename($tmp_zone_path);
	$userId = $_SESSION['user_details']['id'];
	$path = ADMIN_UPLOAD_PATH . "user_{$userId}/songs_billboard/" . $basename;


	$image = new SimpleImage();
	$image->load($tmp_zone_path);
	list($width, $height) = getimagesize($tmp_zone_path);

	if($width > 1200 && $height > 700 && $width >= $height) {
		$image->resizeToWidth(1200);
	}elseif($width > 1200 && $height > 700 && $width <= $height) {
		$image->resizeToHeight(700);
	}elseif($width > 1200 && $height <= 700) {
		$image->resizeToWidth(1200);
	}elseif($width <= 1200 && $height > 700) {
		$image->resizeToHeight(700);
	}

	if ($image->save($path)){
		$tmp_zone_path = str_replace(SITE_URL, DOCUMENT_ROOT . BASE_PATH, $tmp_zone_path);
		@unlink($tmp_zone_path);
		
		$preview_path = ADMIN_UPLOAD_PATH . "user_{$userId}/songs_billboard/preview";
		$preview_url = SITE_URL . "/uploads/user_{$userId}/songs_billboard/preview/{$basename}";
		
		if(!is_dir($preview_path)) {
			mkdir($preview_path, 0777);
		}
		
		@copy($_POST["preview_image"], $preview_path . '/' . $basename);
		
		$preview_image = $_POST["preview_image"];
		$preview_image = str_replace(SITE_URL, DOCUMENT_ROOT . BASE_PATH, $preview_image);
		@unlink($preview_image);
		
		$params = array(
			'id' => $_POST["id"],
			'billboard_image' => $basename
		);

		$tblSongObj->updateSongImage($params);
		echo $preview_url;
	} else {
		echo 0;
	}
}
?>