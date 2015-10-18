<?php 
include_once "inc/config.php";
include_once "controller/tblSongsController.php";
include_once "controller/tblUserController.php";

$song_id = $_POST['song_id'];

$paramArray = array
(	
	"table_name" => "songs",
	"song_id" => $song_id,
);
$dbObj = new database();
$conObj = $dbObj->connectDB();
$songsObj = new tblSongsController($conObj);
$songsDetails = $songsObj->getSongsDetailsById($paramArray);

if($song_id > 0 && $songsDetails[0]['is_download'] == 1)
{
	echo "can download";
}
else
{
	echo "can not download";
}
?>