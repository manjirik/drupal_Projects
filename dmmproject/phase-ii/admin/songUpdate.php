<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblUserSongsController.php";
	$tblpageObj = new tblUserSongsController();
	if($_REQUEST['hPageNum']!="")
	{
		$tmp_page = "&page=".$_REQUEST['hPageNum'];
	}
	$user_id = $_REQUEST['user_id'];
	$goToList = "userSongsList.php?id=".$user_id.$tmp_page;

	//for upload image
		if(is_uploaded_file($_FILES['billboard_image']['tmp_name'])) {
		$filenameext = pathinfo($_FILES["billboard_image"]["name"], PATHINFO_EXTENSION);
		$newname = time().".".$filenameext;
		$path = SITE_DOC_PATH."user_".$user_id."/songs_billboard/".$newname;
		
		copy($_FILES['billboard_image']['tmp_name'], $path);
			}

	$tblpageObj->updateSongRecord();
	header("location: $goToList"); die;	
?>