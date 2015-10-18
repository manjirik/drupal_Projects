<?php

include_once "inc/config.php";
include_once "inc/database.php";
include_once "controller/tblBillboardController.php";

if(!empty($_POST['songID']) && isset($_POST['songID'])) {
	$dbObj = new database();
	$conObj = $dbObj->connectDB();
	$tblBillboardObj = new tblBillboardController($conObj);
	$billboardArr = $tblBillboardObj->getBillboardBySongId(array("songid"=>$_POST['songID']));

	if('' == $billboardArr[0]['billboard_image']) {
		echo HOST_URL . '/images/zoneimagedefault.jpg';
	} else {
		echo HOST_URL . '/uploads/user_' . $billboardArr[0]['user_id'] . '/songs_billboard/' . $billboardArr[0]['billboard_image'];
	}
} else {
	echo 0;
}

?>