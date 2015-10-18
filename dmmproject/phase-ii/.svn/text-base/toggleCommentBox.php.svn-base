<?php

session_start();

include_once "inc/config.php";
include_once "controller/tblSongsController.php";

$dbObj = new database();
$conObj = $dbObj->connectDB();

$songObj = new tblSongsController($conObj);
$song_details = $songObj->getSongsDetailsById(array("song_id" => $_REQUEST['song_id']));

if(count($song_details) > 0) {
	if($_SESSION['user_id'] == $song_details[0]['user_id']) {
		echo 0;
	} else {
		echo 1;
	}
} else {
	echo 1;
}

?>