<?php
session_start();
include("inc/config.php");
include_once("controller/tblNotifyController.php");
include_once("controller/tblSongsController.php");

$paramArray = array
(	
	"table_name" => "songs",
	"song_id" => $_POST['song_id'],
);
$dbObj = new database();
$conObj = $dbObj->connectDB();
$songObj = new tblSongsController($conObj);
$songDetails = $songObj->getSongsDetailsById($paramArray);

$paramArray1 = array
(	
	"table_name" => "notify",
	"notify_user_id" => $_SESSION['user_id'],
	"musician_id" => $songDetails[0]['user_id']
);

$notifyObj = new tblNotifyController($conObj);
$notifyDetails = $notifyObj->checkNotify($paramArray1);
//print_r($notifyDetails);
if(count($notifyDetails) < 1)
{
	$notifyId = $notifyObj->notifyInsert($paramArray1);
	
	if(count($notifyId) > 0)
	{		
		echo "success";
	}
}
else
{
	echo "You are already notified.";
}
?>