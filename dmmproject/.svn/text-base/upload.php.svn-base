<?php
include_once 'inc/config.php';

switch($_GET['type'])
{
	case 'reg_avatar':
		upload_avatar();
		break;
	case 'reg_billboard':
		reg_billboard();
		break;
	case 'reg_billboard_zip':
		reg_billboard_zip();
		break;
	case 'profile_avatar':
		profile_avatar();
		break;
	case 'profile_billboard':
		profile_billboard();
		break;
	case 'song_add_upload':
		song_add_upload();
		break;
	case 'advertise_add_upload':
		advertise_add_upload();
		break;
}
function upload_avatar()
{
	$uploaddir = PREFIX_URL . 'temp_upload/registration/avatar/'; 
	$ext = substr($_FILES["uphoto"]["name"],strrpos($_FILES["uphoto"]["name"],"."));
	$ext = strtolower($ext);
	$file = $uploaddir."avatar_".time().$ext; 
	list($width,$height)=getimagesize($_FILES['uphoto']['tmp_name']);
	if($width > 64 || $height >64)
	{
		echo "Uploaded image should be (64x 64 px)";
	}
	else
	{
		if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
			echo "success : ".$file."pathEnd";   
		} else {
			echo "error";
		}
	}
}

function reg_billboard()
{
	$uploaddir = PREFIX_URL . 'temp_upload/registration/billboard/'; 
	$ext = substr($_FILES["uphoto"]["name"],strrpos($_FILES["uphoto"]["name"],"."));
	$ext = strtolower($ext);
	$file = $uploaddir."billboard_".time().$ext;
	if($_FILES['uphoto']['size']/(1024*1024) > ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB)
	{
		echo "Billboard must be under ".ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB." MB.";
		exit(0);
	}
	if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
		echo "success : ".$file."pathEnd";   
	} else {
		echo "error";
	}
}

function reg_billboard_zip()
{
	$uploaddir = PREFIX_URL . 'temp_upload/registration/billboard_zip/'; 
	$ext = substr($_FILES["uphoto"]["name"],strrpos($_FILES["uphoto"]["name"],"."));
	$ext = strtolower($ext);
	$file = $uploaddir."billboard_zip_".time().$ext;
	if($_FILES['uphoto']['size']/(1024*1024) > ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB)
	{
		echo "Billboard must be under ".ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB." MB.";
		exit(0);
	}
	if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
		echo "success : ".$file."pathEnd";   
	} else {
		echo "error";
	}
}

function profile_avatar()
{
	$uploaddir = PREFIX_URL . 'temp_upload/registration/avatar/'; 
	$ext = substr($_FILES["uphoto"]["name"],strrpos($_FILES["uphoto"]["name"],"."));
	$ext = strtolower($ext);
	$file = $uploaddir."avatar_".time().$ext; 
	list($width,$height)=getimagesize($_FILES['uphoto']['tmp_name']);
	if($width > 64 || $height >64)
	{
		echo "Uploaded image should be (64x 64 px)";
	}
	else
	{
		if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
			echo "success : ".$file."pathEnd";   
		} else {
			echo "error";
		}
	}
}

function profile_billboard()
{ 
	$ext = substr($_FILES["uphoto"]["name"],strrpos($_FILES["uphoto"]["name"],"."));
	$ext = strtolower($ext);
	if($ext == '.zip')
	{
		$uploaddir = PREFIX_URL . 'temp_upload/registration/billboard_zip/';
	}
	else
	{
		$uploaddir = PREFIX_URL . 'temp_upload/registration/billboard/';
	}
	$file = $uploaddir."billboard_".time().$ext;
	if($_FILES['uphoto']['size']/(1024*1024) > ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB)
	{
		echo "Billboard must be under ".ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB." MB.";
		exit(0);
	}
	if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
		echo "success : ".$file."pathEnd".$ext;   
	} else {
		echo "error";
	}
}

function song_add_upload()
{
	$uploaddir = PREFIX_URL . 'temp_upload/songs/songs_zip/'; 
	$ext = substr($_FILES["uphoto"]["name"],strrpos($_FILES["uphoto"]["name"],"."));
	$ext = strtolower($ext);
	$remChar = array("'", "!", "#", "$", "%", "^", "&", "*", "`", "~");
	$song_file = str_replace(" ", "_", substr($_FILES["uphoto"]["name"], 0, strrpos($_FILES["uphoto"]["name"],".")));
	$song_file = str_replace($remChar, "", $song_file);
	$file = $uploaddir.$song_file."_".time().$ext;
	if($_FILES['uphoto']['size']/(1024*1024) > ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB)
	{
		echo "Song must be under ".ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB." MB.";
		exit(0);
	}
	if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
		echo "success : ".$file."pathEnd";   
	} else {
		echo "error";
	}
}

function advertise_add_upload()
{
	$uploaddir = PREFIX_URL . 'temp_upload/adv/adv_zip/';
	$ext = substr($_FILES["uphoto"]["name"],strrpos($_FILES["uphoto"]["name"],"."));
	$ext = strtolower($ext);
	$song_file = str_replace(" ", "_", substr($_FILES["uphoto"]["name"], 0, strrpos($_FILES["uphoto"]["name"],".")));
	$file = $uploaddir.$song_file."_".time().$ext;
	if($_FILES['uphoto']['size']/(1024*1024) > ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB)
	{
		echo "Advertisement must be under ".ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB." MB.";
		exit(0);
	}
	if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
		echo "success : ".$file."pathEnd";   
	} else {
		echo "error";
}
}

?>