<?php

session_start();

include_once "inc/config.php";
include_once "inc/database.php";
include_once "inc/mailer.php";
include_once "inc/getid3/getid3.php";
include_once "controller/tblSongsController.php";

function _create_filename($destination) {
	$basename = basename($destination);
    $directory = dirname($destination);

	$dest = $directory . '/' . $basename;

	if (file_exists($dest)) {
		// Destination file already exists, generate an alternative.
		if ($pos = strrpos($basename, '.')) {
			$name = substr($basename, 0, $pos);
			$ext = substr($basename, $pos);
		}
		else {
			$name = $basename;
			$ext = '';
		}

		$counter = 0;
		do {
			$dest = $directory . '/' . $name . '_' . $counter++ . $ext;
		} while (file_exists($dest));
	}
	return $dest;
}

$song_name = trim($_POST["songName"]);
$uploadSongFilename = trim($_POST["uploadSongFilename"]);

$filename = preg_replace("/[^a-zA-Z0-9.]/", "", strtolower($uploadSongFilename));

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblSongObj = new tblSongsController($conObj);	

$src_path = DOCUMENT_ROOT . BASE_PATH . "/temp_upload/songs/{$uploadSongFilename}";
$upload_relative = DOCUMENT_ROOT . BASE_PATH . "/uploads/user_{$_SESSION['user_id']}/user_songs/{$filename}";


if (file_exists($upload_relative)) {
	$upload_relative = _create_filename($upload_relative);
	$filename = basename($upload_relative);
}
if(copy($src_path, $upload_relative)) {
	/* Start song waveform copy to destination */
	$song_base_path = DOCUMENT_ROOT . BASE_PATH . "/uploads/user_{$_SESSION['user_id']}/user_songs/song_wav";
	$song_waveform_src = DOCUMENT_ROOT . BASE_PATH . "/temp_upload/songs/{$uploadSongFilename}.png";
	$song_waveform_dest = $song_base_path."/{$filename}.png";
	if(!is_dir($song_base_path)) {
		mkdir($song_base_path, 0777);
	}
	
	if(file_exists(DOCUMENT_ROOT . BASE_PATH . "/temp_upload/songs/{$uploadSongFilename}.png")) {
		if(copy($song_waveform_src, $song_waveform_dest)) {
			unlink($song_waveform_src);
		}
	}
	/* End song waveform copy to destination */
	
	$weight = $tblSongObj->getNextSongWeightByUserId($_SESSION['user_id']);
	/* Get song length */
	$getID3 = new getID3();
	$thisFileInfo = $getID3->analyze($upload_relative);
	if($thisFileInfo['playtime_seconds']){
		$songLength = $thisFileInfo['playtime_seconds'];
	}else{
		$songLength = 125;
	}	
	/* End get song length */	
	
	$paramArray = array(
		"table_name" => "songs",
		"song_name" => $song_name,
		"song_length" => $songLength,
		"file_path" => $filename,
		"user_id" => $_SESSION["user_id"],
		"status" => 1,
		"create_date" => date('Y-m-d H:i:s'),
		"weight" => $weight
	);
	//echo '<pre>';print_r($paramArray);
	$song_insert_id = $tblSongObj->saveNewSong($paramArray);
	if($song_insert_id>0){
		unlink($src_path);
	}
	
	/* update $_SESSION user uplaoded song count*/
	$_SESSION['user_details']['all_song_count']++;
	$songDetailArray = array('status'=>1, 'song_count' => $_SESSION['user_details']['all_song_count'], 'song_id'=>$song_insert_id, 'song_length'=>$songLength, 'song_length_mmss'=>$songLengthMS);
} else {
	$songDetailArray = array('status'=>0);
}
	echo json_encode($songDetailArray);
?>