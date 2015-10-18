<?php
include("inc/config.php"); 
$path = SITE_DOC_PATH; // change the path to fit your websites document structure
$fullPath = $path."user_".$_GET['id']."/".$_GET['type']."/".$_GET['download_file'];
$file_name =  $fullPath;


	switch(strtolower(substr(strrchr($file_name,'.'),1)))
	{
		case 'mp3': $mime = 'application/mp3'; break;
		case 'zip': $mime = 'application/zip'; break;
		case 'jpeg':
		case 'jpg': $mime = 'image/jpg'; break;
		default: $mime = 'application/force-download';
	}
	header('Pragma: public'); 	// required
	header('Expires: 0');		// no cache
	header('Cache-Control: must-revalidate, post-check=0, pre-check=0');
	header('Last-Modified: '.gmdate ('D, d M Y H:i:s', filemtime ($file_name)).' GMT');
	header('Cache-Control: private',false);
	header('Content-Type: '.$mime);
	header('Content-Disposition: attachment; filename="'.basename($file_name).'"');
	header('Content-Transfer-Encoding: binary');
	header('Content-Length: '.filesize($file_name));	// provide file size
	header('Connection: close');
	readfile($file_name);		// push it out
	echo "Complete Download";
	exit();
?>