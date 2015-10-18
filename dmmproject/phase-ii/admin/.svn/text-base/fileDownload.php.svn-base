<?php

include_once "inc/config.php";
$path = SITE_DOC_PATH;
$fullPath = $path . "user_" . $_GET['id'] . "/" . $_GET['type'] . "/" . $_GET['download_file'];
	
$path_parts = pathinfo($file_path);
$extension = $path_parts['extension'];

switch($extension) {
	case 'mp3': 
		$mime = 'application/mp3';
		break;
		
	case 'zip': 
		$mime = 'application/zip'; 
		break;
		
	case 'jpeg':
	case 'jpg': 
		$mime = 'image/jpg'; 
		break;
		
	default: 
		$mime = 'application/force-download';
}


// Force to download file
header('Pragma: public'); 	// required
header('Expires: 0');		// no cache
header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
header('Last-Modified: '. gmdate ('D, d M Y H:i:s', filemtime ($fullPath)) . ' GMT');
header('Cache-Control: private',false);
header('Content-Type: '. $mime);
header('Content-Disposition: attachment; filename="' . basename($fullPath) . '"');
header('Content-Transfer-Encoding: binary');
header('Content-Length: ' . filesize($fullPath));	// provide file size
header('Connection: close');
readfile($fullPath);		// push it out
exit();

?>