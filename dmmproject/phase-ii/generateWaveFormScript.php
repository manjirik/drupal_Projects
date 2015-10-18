<?php

ini_set('display_errors', 'on');
error_reporting(E_ALL);

session_start();
ini_set("memory_limit","1G");
set_time_limit(0);

include_once "inc/config.php";
include_once "inc/database.php";
include_once "inc/getid3/getid3.php";
include_once "controller/tblSongsController.php";

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblSongObj = new tblSongsController($conObj);
$getID3 = new getID3();

/* get song details */
$songFileNameArray = $tblSongObj->getSongsFileName();

/* prepare song path */
unset($notDoneArray);
$notDoneArray = array();
foreach($songFileNameArray as $key=>$songArray){
	$baseDirPath = DOCUMENT_ROOT . BASE_PATH . "/uploads/user_{$songArray['user_id']}";
	
	if(is_dir($baseDirPath)){
		$songPath = $baseDirPath."/user_songs/".$songArray['file_path']."";
		$song_id = $songArray['id'];
			if(file_exists($songPath)){
				/* get song length by using getid3 */
				$thisFileInfo = $getID3->analyze($songPath);
				if($thisFileInfo['playtime_seconds']){
					$songLength = round($thisFileInfo['playtime_seconds'], 2);
				}else{
					$songLength = 0;
				}	
				echo $song_id.' '.$songLength.'<br>';
				flush();
				/* End get song length by using getid3 */
				
				/* update in db */
				$tblSongObj->saveSongLength($song_id, $songLength);
				
				// /* generate song wave */
				// $destPath = $baseDirPath."/user_songs/song_wav/";
				// if(!is_dir($destPath)) {
					// mkdir($destPath, 0777);
				// }
				// $content = file_get_contents(SITE_URL."/generateWaveForm.php?songPath=".$songPath);
				
				// //print_r($content);
				// //echo '<pre>';print_r($content);exit;
				// $destPath = DOCUMENT_ROOT . "/images/";
				// $fp = fopen($destPath.$songArray['file_path'].".png", "w");
				// fwrite($fp, $content);
				// fclose($fp);
				// /* end generate song wave */
			}
	}
}
?>