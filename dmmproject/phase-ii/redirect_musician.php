<?php
session_start();
include("inc/config.php");
include_once("controller/tblSongsController.php");

$dbObj = new database();
$conObj = $dbObj->connectDB();
$songObj = new tblSongsController($conObj);
$dmmCompanyName = $songObj->getDmmCompanyNameBySongId($_POST['song_id']);
//$tmp_dmmCompanyName = $dmmCompanyName[0]['user_id'];
echo $dmmCompanyName;
?>