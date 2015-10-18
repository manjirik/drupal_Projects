<?php

include_once 'inc/config.php';

switch($_GET['type']) {
	// case 'reg_avatar':
		// upload_avatar();
		// break;
	case 'reg_zone':
		reg_zone();
		break;
	// case 'reg_billboard':
		// reg_billboard();
		// break;
	// case 'reg_billboard_zip':
		// reg_billboard_zip();
		// break;
	case 'profile_avatar':
		profile_avatar();
		break;
	// case 'profile_billboard':
		// profile_billboard();
		// break;
	case 'profile_zone':
		profile_zone();
		break;
	case 'song_add_upload':
		song_add_upload();
		break;
	case 'advertise_add_upload':
		advertise_add_upload();
		break;
}


// function upload_avatar() {
	// $uploaddir = DOCUMENT_ROOT . BASE_PATH . '/temp_upload/registration/avatar/';
	
	// $path_parts = pathinfo($_FILES["uphoto"]["name"]);
	// $ext = strtolower($path_parts["extension"]);
	
	// $file = $uploaddir . "avatar_" . time() . "." . $ext;
	
	// list($width, $height) = getimagesize($_FILES['uphoto']['tmp_name']);
	// if($width > 64 || $height >64) {
		// echo "Uploaded image should be (64x 64 px)";
	// } else {
		// if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
			// echo "success : " . $file . "pathEnd";   
		// } else {
			// echo "error";
		// }
	// }
// }

function reg_zone() {
	$uploaddir = DOCUMENT_ROOT . BASE_PATH . '/temp_upload/registration/zone/'; 
	
	$path_parts = pathinfo($_FILES["uphoto"]["name"]);
	$ext = strtolower($path_parts["extension"]);
	
	$file = $uploaddir . "zone_" . time() . "." . $ext;
	/*if($_FILES['uphoto']['size']/(1024*1024) > ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB) {
		echo json_encode(array('status' => 0, 'error' => 'Uploaded image should be under ' . ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB . ' MB.'));
	}*/
	if($_FILES['uphoto']['size']/(1024*1024) > 10) {
		echo json_encode(array('status' => 0, 'error' => 'Image must be under 10 MB'));
	} else if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
		echo json_encode(array('status' => 1, 'path' => str_replace(DOCUMENT_ROOT . BASE_PATH, HOST_URL, $file)));
	} else {
		echo json_encode(array('status' => 0));
	}
}

// function reg_billboard() {
	// $uploaddir = DOCUMENT_ROOT . BASE_PATH . '/temp_upload/registration/billboard/'; 
	
	// $path_parts = pathinfo($_FILES["uphoto"]["name"]);
	// $ext = strtolower($path_parts["extension"]);
	
	// $file = $uploaddir . "billboard_" . time() . "." . $ext;
	// if($_FILES['uphoto']['size']/(1024*1024) > ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB) {
		// echo json_encode(array('status' => 0, 'error' => 'Uploaded image should be under ' . ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB . ' MB.'));
	// }
	
	// if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
		// echo json_encode(array('status' => 1, 'path' => str_replace(DOCUMENT_ROOT . BASE_PATH, HOST_URL, $file)));
	// } else {
		// echo json_encode(array('status' => 0));
	// }
// }


// function reg_billboard_zip() {
	// $uploaddir = DOCUMENT_ROOT . BASE_PATH . '/temp_upload/registration/billboard_zip/';
	
	// $path_parts = pathinfo($_FILES["uphoto"]["name"]);
	// $ext = strtolower($path_parts["extension"]);
	
	// $file = $uploaddir . "billboard_zip_" . time() . "." . $ext;
	// if($_FILES['uphoto']['size']/(1024*1024) > ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB) {
		// echo "Billboard must be under " . ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB . " MB.";
		// exit(0);
	// }
	
	// if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
		// echo "success : " . $file . "pathEnd";   
	// } else {
		// echo "error";
	// }
// }


function profile_avatar() {
	$uploaddir = DOCUMENT_ROOT . BASE_PATH . '/temp_upload/registration/avatar/';
	
	$path_parts = pathinfo($_FILES["uphoto"]["name"]);
	$ext = strtolower($path_parts["extension"]);

	$file = $uploaddir . "avatar_" . time() . "." . $ext;
	
	if($_FILES['uphoto']['size']/(1024*1024) > 10) {
		echo json_encode(array('status' => 0, 'error' => 'Avatar must be under 10 MB'));
	} else if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
		echo json_encode(array('status' => 1, 'path' => str_replace(DOCUMENT_ROOT . BASE_PATH, HOST_URL, $file)));
	} else {
		echo json_encode(array('status' => 0));
	}
}

// function profile_billboard() {

	// $path_parts = pathinfo($_FILES["uphoto"]["name"]);
	// $ext = strtolower($path_parts["extension"]);
	
	// if($ext == 'zip') {
		// $uploaddir = DOCUMENT_ROOT . BASE_PATH . '/temp_upload/registration/billboard_zip/';
	// } else {
		// $uploaddir = DOCUMENT_ROOT . BASE_PATH . '/temp_upload/registration/billboard/';
	// }
	
	// $file = $uploaddir . "billboard_" . time() . "." . $ext;
	
	// /*list($width, $height) = getimagesize($_FILES['uphoto']['tmp_name']);
	// if($width > 1200 || $height > 700) {
		// echo json_encode(array('status' => 0, 'error' => 'Uploaded image should be (1200x700 px)'));
	// } else */
	// if($_FILES['uphoto']['size']/(1024*1024) > ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB) {
		// echo json_encode(array('status' => 0, 'error' => 'Billboard must be under ' . ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB . 'MB'));
	// } else if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) {
		// echo json_encode(array('status' => 1, 'path' => str_replace(DOCUMENT_ROOT . BASE_PATH, HOST_URL, $file)));
	// } else {
		// echo json_encode(array('status' => 0));
	// }

// }

function profile_zone() {

	$path_parts = pathinfo($_FILES["uphoto"]["name"]);
	$ext = strtolower($path_parts["extension"]);
	
	if($ext == 'zip') {
		$uploaddir = DOCUMENT_ROOT . BASE_PATH . '/temp_upload/registration/zone/';
	} else {
		$uploaddir = DOCUMENT_ROOT . BASE_PATH . '/temp_upload/registration/zone/';
	}
	
	$file = $uploaddir . "zone_" . time() . "." . $ext;
	
	/*list($width, $height) = getimagesize($_FILES['uphoto']['tmp_name']);
	if($width > 1200 || $height > 700) {
		echo json_encode(array('status' => 0, 'error' => 'Uploaded image should be (1200x700 px)'));
	} else */
	if($_FILES['uphoto']['size']/(1024*1024) > ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB) {
		echo json_encode(array('status' => 0, 'error' => 'Billboard must be under ' . ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB . 'MB'));
	} else if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) {
		echo json_encode(array('status' => 1, 'path' => str_replace(DOCUMENT_ROOT . BASE_PATH, HOST_URL, $file)));
	} else {
		echo json_encode(array('status' => 0));
	}

}


/**
 * Function to upload song
 */
function song_add_upload() {
	$uploaddir = DOCUMENT_ROOT . BASE_PATH . '/temp_upload/songs/songs_zip/';
	
	$path_parts = pathinfo($_FILES["uphoto"]["name"]);
	$ext = strtolower($path_parts["extension"]);
	
	$remChar = array("'", "!", "#", "$", "%", "^", "&", "*", "`", "~");
	$song_file = str_replace(" ", "_", substr($_FILES["uphoto"]["name"], 0, strrpos($_FILES["uphoto"]["name"],".")));
	$song_file = str_replace($remChar, "", $song_file);
	$file = $uploaddir . $song_file . "_" . time() . "." . $ext;
	
	if($_FILES['uphoto']['size']/(1024*1024) > ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB) {
		echo "Song must be under " . ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB . " MB.";
		exit(0);
	}
	
	if (move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) { 	
		echo "success : " . $file . "pathEnd";   
	} else {
		echo "error";
	}
	
}

function advertise_add_upload() {
	$uploaddir = DOCUMENT_ROOT . BASE_PATH . '/temp_upload/adv/adv_zip/';
	
	$path_parts = pathinfo($_FILES["uphoto"]["name"]);
	$ext = strtolower($path_parts["extension"]);

	$song_file = str_replace(" ", "_", $path_parts["filename"]);
	$file = $uploaddir . $song_file . "_" . time() . "." . $ext;
	if($_FILES['uphoto']['size']/(1024*1024) > ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB) {
		echo "Advertisement must be under " . ADMIN_FILE_MAX_UPLOAD_SIZE_IN_MB . " MB.";
		exit(0);
	}
	
	if(move_uploaded_file($_FILES['uphoto']['tmp_name'], $file)) {
		echo "success : " . $file . "pathEnd";   
	} else {
		echo "error";
	}
	
}

?>