<?php
include_once("inc/database.php");
include_once("controller/tblSongsController.php");	
if(isset($_POST["songid"]))
{ 
}else{
$dbObj = new database();
$conObj = $dbObj->connectDB();
$tblSongObj = new tblSongsController($conObj);
$songArr = $tblSongObj->addHitSite();
}
?>