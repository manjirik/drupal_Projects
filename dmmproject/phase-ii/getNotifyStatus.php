<?php

session_start();

include_once "inc/config.php";
include_once "controller/tblNotifyController.php";
include_once "controller/tblSongsController.php";

$dbObj = new database();
$conObj = $dbObj->connectDB();

$paramArray = array(
	"table_name" => "songs",
	"song_id" => $_POST['song_id'],
);
$songObj = new tblSongsController($conObj);
$songDetails = $songObj->getSongsDetailsById($paramArray);

$paramArray1 = array(
	"notify_user_id" => $_SESSION['user_id'],
	"musician_id" => $songDetails[0]['user_id']
);
$notifyObj = new tblNotifyController($conObj);
$notifyDetails = $notifyObj->checkNotify($paramArray1);

if(count($notifyDetails)) {
	echo 1;
} else {
	echo 0;
}

?>