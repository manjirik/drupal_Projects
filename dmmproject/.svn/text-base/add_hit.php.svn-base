<?php
include_once "inc/database.php";
include_once "controller/tblSongsController.php";

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblSongObj = new tblSongsController($conObj);
$songArr = $tblSongObj->addHitSongId(array("songid"=>$_POST['songID']));
?>