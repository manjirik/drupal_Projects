<?php

session_start();

include_once "inc/config.php";
include_once "controller/tblNotifyController.php";
include_once "controller/tblSongsController.php";

/* User not logged in return -1 */
if(empty($_SESSION['user_id'])) {
	echo -1;
} else {

	$paramArray = array(
		"table_name" => "songs",
		"song_id" => $_POST['song_id'],
	);

	$dbObj = new database();
	$conObj = $dbObj->connectDB();
	$songObj = new tblSongsController($conObj);
	$songDetails = $songObj->getSongsDetailsById($paramArray);

	/* song uploaded by current loggin user OR user is in it's zone with no song uploaded */
	if( ($songDetails[0]['user_id'] == $_SESSION['user_id']) || ($_POST['musician_name'] == $_SESSION['user_name']) ) {
		echo -2;
	} else {
		$paramArray1 = array(
			"table_name" => "notify",
			"notify_user_id" => $_SESSION['user_id'],
			"musician_id" => $songDetails[0]['user_id']
		);
		$notifyObj = new tblNotifyController($conObj);

		/* set notify */
		if(1 == $_GET['set_notify'] && 0 == $_GET['remove_notify']) {
			$notifyDetails = $notifyObj->checkNotify($paramArray1);

			if(count($notifyDetails) < 1) {
				$notifyId = $notifyObj->notifyInsert($paramArray1);
				if(count($notifyId) > 0) {
					echo 1;
				}
			} else {
				echo 0;
			}
		} else if(0 == $_GET['set_notify'] && 1 == $_GET['remove_notify']) {	/* remove notify */
			$notifyObj->removeNotify($paramArray1);
			echo 1;
		}
	}
}

?>