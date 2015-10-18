<?php

session_start();

include_once "inc/config.php";
include_once "inc/database.php";
include_once "controller/tblSongsController.php";

$song_id = $_POST['song_id'];

$dbObj = new database();
$conObj = $dbObj->connectDB();

$songsObj = new tblSongsController($conObj);
$songDetails = $songsObj->getSongsDetailsById(array('song_id' => $song_id));

$user_details = $_SESSION['user_details'];

/* Check ownere of song */
if($songDetails[0]['user_id'] == $user_details['id']) {
	$file_path = DOCUMENT_ROOT . BASE_PATH . "/uploads/user_{$user_details['id']}/user_songs/{$songDetails[0]['file_path']}";
	unlink($file_path);
	
	if(!empty($songDetails[0]['billboard_image'])) {
		$billboard_image = DOCUMENT_ROOT . BASE_PATH . "/uploads/user_{$user_details['id']}/user_billboard/{$songDetails[0]['billboard_image']}";
		unlink($billboard_image);
	}
	
	$song_wave = DOCUMENT_ROOT . BASE_PATH . "/uploads/user_{$user_details['id']}/user_songs/song_wav/{$songDetails[0]['file_path']}.png";
	if(file_exists($song_wave)) {
		unlink($song_wave);
	}
	
	
	$status = $songsObj->deletSongBySongId($song_id);
	if($status) {
		$_SESSION['user_details']['all_song_count']--;
	}
	echo json_encode(array('status' => $status, 'song_count' => $_SESSION['user_details']['all_song_count']));
	
	
} else {
	/* Song del request not from valid/owner of song*/
	//echo -999;
	echo json_encode(array('status' => -999));
}

?>