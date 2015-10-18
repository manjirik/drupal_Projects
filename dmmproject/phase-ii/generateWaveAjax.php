<?php
	/*
	 * File : Generate song wave form using file get contents method
	 * 
	*/ 
	include_once "inc/config.php";	
	include_once 'inc/database.php';
	include_once 'controller/tblSongsController.php';
	
	$dbObj = new database();
	$conObj = $dbObj->connectDB();
	$tblSongObj = new tblSongsController($conObj);	
	
	$songId = trim($_POST["songId"]);
	$destPath = DOCUMENT_ROOT . BASE_PATH . "/uploads/user_{$_SESSION['user_id']}/user_songs/song_wav";
	
	if(!is_dir($destPath)) {
		mkdir($destPath, 0777);
	}
	
	$filename = $tblSongObj->getSongFilePathBySongId($songId);
	$uploadRelativePath = DOCUMENT_ROOT . BASE_PATH . "/uploads/user_{$_SESSION['user_id']}/user_songs/{$filename}";
	$content = file_get_contents(SITE_URL."/generateWaveForm.php?songPath=".$uploadRelativePath);
	
	if(0 == $content) {
		copy(DOCUMENT_ROOT . BASE_PATH . '/images/defaultWaveImg.png', "{$destPath}/{$filename}.png");
	} else {
		//Store in the filesystem.
		$fp = fopen("{$destPath}/{$filename}.png", "w");
		fwrite($fp, $content);
		fclose($fp);
	}
	
	
?>