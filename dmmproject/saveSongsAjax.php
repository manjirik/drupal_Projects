<?php 
session_start();
include_once "inc/config.php"; 
include_once "inc/database.php";
include_once "inc/mailer.php";
include_once "controller/tblSongsController.php";

$song_name = trim($_POST["song_name"]);
$song_credit = trim($_POST["song_credit"]);
$song_file_path = trim($_POST["song_file_path"]);

$song_name_arr = explode(",",$song_name);
$song_credit_arr = explode(",",$song_credit);
$song_file_path_array = explode(",",$song_file_path);

$top = COMMENT_LIST_COUNT;
$success_flag = 0;
for($i=0; $i<4; $i++)
{
	if($song_name_arr[$i] != '' && $song_file_path_array[$i] != '')
	{
		$song_file_path_arr = explode("/", $song_file_path_array[$i]);
		$song_file = $song_file_path_arr[count($song_file_path_arr)-1];
		
		$ext = substr($song_file, strrpos($song_file, ".")+1);
		$song_file_name = substr($song_file, 0, strrpos($song_file, ".")-1);
		$song_file_name_arr = explode("_", $song_file_name);
		$song_file_act = implode("_",$song_file_name_arr).".".$ext;
		
		$dbObj = new database();
		$conObj = $dbObj->connectDB();
		$tblSongObj = new tblSongsController($conObj);	
		
		//saving a new comment
		$paramArray = array
		(
			"table_name" => "songs",
			"song_name" => $song_name_arr[$i],							
			"song_credit" => $song_credit_arr[$i],						
			"file_path" => $song_file_act,
			"user_id" => $_SESSION["user_id"],
			"status" => 0,
			"create_date" => date('Y-m-d H:i:s')
		);
		$upload_relative = "uploads/user_".$_SESSION["user_id"]."/user_songs/";
		if (copy($song_file_path_array[$i], $upload_relative.$song_file_act)) 
		{ 	
			$song_insert_id = $tblSongObj->saveNewSong($paramArray);
			if($song_insert_id>0)
			{		
				unlink($song_file_path_array[$i]);	
			}
			$paramArray1 = array
			(	
				"table_name" => "songs",
				"user_id" => $_SESSION["user_id"],
			);
			$songsDetails = $tblSongObj->getSongsDetailsByUser($paramArray1);
			$songsCount = count($songsDetails);
		}
		else
		{
			$success_flag = 1;
		}
	}
}
if($success_flag == 0)
{
	echo "song insert successfully:".$songsCount.":End";
	mailForNotifySongsUpload($adminEmail, $_SESSION["user_name"]);
}
else
{
	echo "error";
}

$dbObj = $tblCommentObj = null; ?>