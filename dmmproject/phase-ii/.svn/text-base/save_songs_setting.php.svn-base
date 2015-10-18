<?php

	session_start();
	include_once 'inc/database.php';
	include_once 'controller/tblSongsController.php';
	
	$dbObj = new database();
	$conObj = $dbObj->connectDB();
	
	$songsObj = new tblSongsController($conObj);

	$rows = $_POST['songs'][0];

	$status = 1;
	foreach($rows as $row) {
		// $songsDetails = $songsObj->updateSongRecord($row);
		$row['credits'] = serialize($row['credits']);
		$status = $status & count($songsObj->updateSongRecord($row));
	}
	
	$userDetails = $_SESSION['user_details'];
	
	echo json_encode(array('status' => $status, 'username' =>$userDetails['dmm_company_name']));
	// echo $status;

?>