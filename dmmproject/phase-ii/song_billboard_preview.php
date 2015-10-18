<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

session_start();
ini_set("memory_limit","1G");
set_time_limit(0);

include_once "inc/config.php";
include_once "inc/database.php";
include_once 'inc/SimpleImage.php';
include_once "controller/tblSongsController.php";

flush();

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblSongObj = new tblSongsController($conObj);

$songFileNameArray = $tblSongObj->getSongsFileName();

foreach($songFileNameArray as $key => $value){
	if($value['billboard_image']) {
		$preview_path = DOCUMENT_ROOT . BASE_PATH . "/uploads/user_{$value['user_id']}/songs_billboard/preview/{$value['billboard_image']}";
		
		if(!file_exists($preview_path)) {
			$path = DOCUMENT_ROOT . BASE_PATH . "/uploads/user_{$value['user_id']}/songs_billboard/preview/";
			if(!is_dir($path)) {
				mkdir($path, 0755);
			}
			
			$image_path = DOCUMENT_ROOT . BASE_PATH . "/uploads/user_{$value['user_id']}/songs_billboard/{$value['billboard_image']}";

			$image = new SimpleImage();
			$image->load($image_path);
			$image->resize(300, 107);
			$image->save($preview_path);

		}
	}
}

echo "Done";
?>