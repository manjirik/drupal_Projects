<?php
session_start();
include_once "inc/config.php";	
include_once 'inc/database.php';
include_once 'controller/tblSongsController.php';

//error_reporting(E_ALL);
$songStartTime = trim($_POST["songStartTime"]);
$songDuration = trim($_POST["songDuration"]);
$songID = trim($_POST["songID"]);
$for_sell = trim($_POST["for_sell"]);

$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblSongObj = new tblSongsController($conObj);
	
$filename = $tblSongObj->saveSongStartTimeAndDuration($songID, $songStartTime, $songDuration, $for_sell);
?>