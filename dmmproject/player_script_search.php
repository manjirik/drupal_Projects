<?php
session_start();
include_once("inc/phpFunctions.php");
$phpFun = new phpFunctions();
include("inc/config.php");
include_once("controller/tblSettingsController.php");
$dbObj = new database();
$conObj = $dbObj->connectDB();
$settingsObj = new tblSettingsController($conObj);
$settingArr = $settingsObj->getSettings();

if(isset($_REQUEST["songdbid"]))
{
	if($_REQUEST['musician_get'] == 'no'){
	$tmp_user_id = '0';
	}else{
	$tmp_user_id = $settingsObj->getUserID($_REQUEST['musician_get']);
	}
	//start code for redirect function
	
	//End code for redirect function
	$xmlGenresFile = ROOT_URL . '/playlist_xml.php?tmp_playlist_songid='.$_REQUEST['songdbid'].'&musician_id='.$tmp_user_id;
	
}
include_once('inc/xml_fuc.php');
$contents = file_get_contents($xmlGenresFile);

$arrXml1 = xml2array($contents);

$arrXml = $arrXml1['HIPPOP'];
$arrXmlCnt = count($arrXml);
$playListStr = "";
$first_song_id  = 0;
$counter_song = 0;

$jsArr = array();

$cnt = 0;

foreach ($arrXml as $key => $value) {
	$jsArr[$cnt]["SONGID"] = $value["SONGID"];
	$jsArr[$cnt]["TITLE"]  = htmlentities($value["TITLE"], ENT_QUOTES);
	$jsArr[$cnt]["PATH"]   = $value["PATH"];
	$jsArr[$cnt]["POSTER"] = $value["POSTER"];

	$cnt++;	
}

//$jsArr['math'] = $jsArr;

echo json_encode($jsArr);

?>