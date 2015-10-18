<?php 
	include_once "inc/config.php";
	include_once "inc/chkSession.php";
	include_once "controller/tblAdminAdvertiseController.php";
	$tblpageObj = new tblAdminAdvertiseController();
	if($_REQUEST['hPageNum']!="")
	{
		$tmp_page = "?page=".$_REQUEST['hPageNum'];
	}
	$goToList = "adminAdvList.php".$tmp_page;
	

	//for upload adv thumb image
		if(is_uploaded_file($_FILES['ad_thumb_path']['tmp_name'])) {
		$filenameext = pathinfo($_FILES["ad_thumb_path"]["name"], PATHINFO_EXTENSION);
		$newname = time()."_thumb.".$filenameext;
		$path = UPLOAD_ADV_ROOT_URL."uploads_adv/thumb/".$newname;
		copy($_FILES['ad_thumb_path']['tmp_name'], $path);
		}

	//for upload adv image
		if(is_uploaded_file($_FILES['ad_path']['tmp_name'])) {
		$filenameext1 = pathinfo($_FILES["ad_path"]["name"], PATHINFO_EXTENSION);
		$newname1 = time().".".$filenameext1;
		$path = UPLOAD_ADV_ROOT_URL."uploads_adv/".$newname1;
		copy($_FILES['ad_path']['tmp_name'], $path);
			}
	$tblpageObj->updateAdvertiseRecord();
	header("location: $goToList"); die;	
?>