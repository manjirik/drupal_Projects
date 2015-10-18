<?php

include_once "inc/database.php";
include_once "controller/tblSongsController.php";

$dbObj = new database();
$conObj = $dbObj->connectDB();

$tblSongNameObj = new tblSongsController($conObj);
$songNameArr = $tblSongNameObj->getSongName(array("songid"=>$_POST['songID']));
$songNameArrCnt = count($songNameArr);

if($songNameArrCnt >0) {
	echo $songNameArr[0]["mname"];
} else {
	echo '';
}

?>