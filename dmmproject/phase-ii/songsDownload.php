<?php 
include("inc/config.php");
include_once("controller/tblSongsController.php");
include_once("controller/tblUserController.php");

$song_id = $_GET['song_id'];

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
	$file = 'uploads/user_'.$songsDetails[0]['user_id'].'/user_songs/'.$songsDetails[0]['file_path'];
	if (file_exists($file)) 
	{
		$paramArray1 = array
		(	
			"table_name" => "songs",
			"song_id" => $song_id,
		);
		$updateDownloadSong = $songsObj->updateDownloadSong($paramArray1);
		header('Content-Description: File Transfer');
		//header('Content-Type: application/octet-stream');
		header('Content-type: application/force-download');
		header('Content-Disposition: attachment; filename='.basename($file));
		header('Content-Transfer-Encoding: binary');
		header('Expires: 0');
		header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
		header('Pragma: public');
		header('Content-Length: ' . filesize($file));
		ob_clean();
		flush();
		readfile($file);
		exit;
	}
}
?>